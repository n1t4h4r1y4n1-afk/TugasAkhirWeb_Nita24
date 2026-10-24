<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Halaman checkout
     */
    public function checkout(TicketType $ticketType)
    {
        $ticketType->load('event');

        if (!$ticketType->event || !$ticketType->event->status) {
            abort(404);
        }

        $available = $ticketType->stock - $ticketType->sold;

        if ($available <= 0) {
            return back()->with(
                'error',
                'Tiket sudah habis.'
            );
        }

        return view('checkout', compact(
            'ticketType',
            'available'
        ));
    }


    /**
     * Proses pembelian tiket
     *
     * Pembayaran otomatis untuk sementara.
     */
    public function store(
        Request $request,
        TicketType $ticketType
    ) {
        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        $quantity = $validated['quantity'];

        $ticketType->load('event');

        if (
            !$ticketType->event ||
            !$ticketType->event->status
        ) {
            abort(404);
        }

        $order = DB::transaction(function () use (
            $ticketType,
            $quantity
        ) {

            // Kunci ticket type agar stok aman
            $ticketType = TicketType::where(
                'id',
                $ticketType->id
            )
                ->lockForUpdate()
                ->firstOrFail();

            // Hitung stok tersedia
            $available =
                $ticketType->stock -
                $ticketType->sold;

            // Cek stok
            if ($quantity > $available) {
                abort(
                    400,
                    "Tiket yang tersedia hanya {$available}."
                );
            }

            // Buat kode order unik
            do {

                $orderCode =
                    'ORD-' .
                    strtoupper(
                        Str::random(10)
                    );

            } while (
                Order::where(
                    'order_code',
                    $orderCode
                )->exists()
            );

            // Hitung total
            $total =
                $ticketType->price *
                $quantity;

            /*
             * PEMBAYARAN OTOMATIS
             *
             * Tidak perlu pilih:
             * - Bank Transfer
             * - QRIS
             * - E-Wallet
             *
             * Order langsung dianggap PAID.
             */
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_code' => $orderCode,
                'total_amount' => $total,
                'payment_method' => 'automatic',
                'payment_status' => 'paid',
            ]);

            // Simpan detail order
            OrderItem::create([
                'order_id' => $order->id,
                'ticket_type_id' => $ticketType->id,
                'quantity' => $quantity,
                'price' => $ticketType->price,
                'subtotal' => $total,
            ]);

            // Tambahkan jumlah tiket terjual
            $ticketType->increment(
                'sold',
                $quantity
            );

            // Buat tiket satu per satu
            for (
                $i = 0;
                $i < $quantity;
                $i++
            ) {

                // Buat kode tiket unik
                do {

                    $ticketCode =
                        'TIX-' .
                        strtoupper(
                            Str::random(12)
                        );

                } while (
                    Ticket::where(
                        'ticket_code',
                        $ticketCode
                    )->exists()
                );

                Ticket::create([
                    'order_id' => $order->id,
                    'user_id' => Auth::id(),
                    'event_id' => $ticketType->event_id,
                    'ticket_type_id' => $ticketType->id,
                    'ticket_code' => $ticketCode,
                    'qr_code' => $ticketCode,
                    'status' => 'active',
                    'checked_in_at' => null,
                ]);
            }

            return $order;
        });

        // Langsung ke tiket saya
        return redirect()
            ->route('tickets.index')
            ->with(
                'success',
                'Pembelian berhasil! E-ticket kamu sudah tersedia.'
            );
    }
}