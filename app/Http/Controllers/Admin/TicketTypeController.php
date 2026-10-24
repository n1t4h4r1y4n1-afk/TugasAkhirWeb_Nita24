<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * Menampilkan semua jenis tiket
     */
    public function index()
    {
        $ticketTypes = TicketType::with('event')
            ->latest()
            ->get();

        return view(
            'admin.ticket-types.index',
            compact('ticketTypes')
        );
    }


    /**
     * Form tambah jenis tiket
     */
    public function create(Request $request)
    {
        $events = Event::where('status', true)
            ->latest()
            ->get();

        $selectedEventId = $request->event_id;

        return view(
            'admin.ticket-types.create',
            compact('events', 'selectedEventId')
        );
    }


    /**
     * Simpan jenis tiket baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
        ]);

        TicketType::create([
            'event_id' => $validated['event_id'],
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'sold' => 0,
        ]);

        return redirect()
            ->route('admin.ticket-types.index')
            ->with(
                'success',
                'Jenis tiket berhasil ditambahkan!'
            );
    }


    /**
     * Form edit jenis tiket
     */
    public function edit(TicketType $ticketType)
    {
        $events = Event::where('status', true)
            ->latest()
            ->get();

        return view(
            'admin.ticket-types.edit',
            compact('ticketType', 'events')
        );
    }


    /**
     * Update jenis tiket
     */
    public function update(
        Request $request,
        TicketType $ticketType
    ) {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => [
                'required',
                'integer',
                'min:' . max(1, (int) $ticketType->sold),
            ],
        ], [
            'stock.min' =>
                'Stok tidak boleh lebih kecil dari jumlah tiket yang sudah terjual (' .
                $ticketType->sold .
                ').',
        ]);

        $ticketType->update([
            'event_id' => $validated['event_id'],
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
        ]);

        return redirect()
            ->route('admin.ticket-types.index')
            ->with(
                'success',
                'Jenis tiket berhasil diperbarui!'
            );
    }


    /**
     * Hapus jenis tiket
     */
    public function destroy(TicketType $ticketType)
    {
        $ticketType->delete();

        return redirect()
            ->route('admin.ticket-types.index')
            ->with(
                'success',
                'Jenis tiket berhasil dihapus!'
            );
    }
}