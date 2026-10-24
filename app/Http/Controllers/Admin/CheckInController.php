<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    /**
     * Menampilkan halaman scanner QR untuk petugas
     */
    public function index()
    {
        return view('petugas.scanner');
    }


    /**
     * Memproses hasil scan QR Code
     */
    public function check(Request $request)
    {
        $request->validate([
            'ticket_code' => 'required|string',
        ]);


        // ==========================================
        // CARI TIKET
        // ==========================================

        $ticket = Ticket::where(
            'ticket_code',
            $request->ticket_code
        )->first();


        // ==========================================
        // TIKET TIDAK DITEMUKAN
        // ==========================================

        if (!$ticket) {

            return response()->json([
                'success' => false,
                'message' => '❌ TIKET TIDAK VALID',
            ], 404);

        }


        // ==========================================
        // TIKET SUDAH DIGUNAKAN
        // ==========================================

        if ($ticket->status === 'used') {

            return response()->json([
                'success' => false,
                'message' => '⚠️ TIKET SUDAH DIGUNAKAN',

                'ticket' => [
                    'code' => $ticket->ticket_code,
                    'status' => $ticket->status,
                    'event' => $ticket->event
                        ? $ticket->event->title
                        : '-',

                    'ticket_type' => $ticket->ticketType
                        ? $ticket->ticketType->name
                        : '-',

                    'user' => $ticket->user
                        ? $ticket->user->name
                        : '-',
                ],
            ], 422);

        }


        // ==========================================
        // TIKET DIBATALKAN
        // ==========================================

        if ($ticket->status === 'cancelled') {

            return response()->json([
                'success' => false,
                'message' => '❌ TIKET DIBATALKAN',

                'ticket' => [
                    'code' => $ticket->ticket_code,
                    'status' => $ticket->status,
                    'event' => $ticket->event
                        ? $ticket->event->title
                        : '-',

                    'ticket_type' => $ticket->ticketType
                        ? $ticket->ticketType->name
                        : '-',

                    'user' => $ticket->user
                        ? $ticket->user->name
                        : '-',
                ],
            ], 422);

        }


        // ==========================================
        // TIKET VALID
        // ==========================================

        if ($ticket->status === 'active') {

            // Ubah status menjadi sudah digunakan
            $ticket->status = 'used';

            // Simpan waktu check-in
            $ticket->checked_in_at = now();

            $ticket->save();


            return response()->json([
                'success' => true,

                'message' => '✅ TIKET VALID - SILAKAN MASUK',

                'ticket' => [
                    'code' => $ticket->ticket_code,

                    'status' => $ticket->status,

                    'event' => $ticket->event
                        ? $ticket->event->title
                        : '-',

                    'ticket_type' => $ticket->ticketType
                        ? $ticket->ticketType->name
                        : '-',

                    'user' => $ticket->user
                        ? $ticket->user->name
                        : '-',
                ],
            ]);

        }


        // ==========================================
        // STATUS LAIN
        // ==========================================

        return response()->json([
            'success' => false,
            'message' => '❌ STATUS TIKET TIDAK VALID',
        ], 422);
    }
}