<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
      

class TicketController extends Controller
{
    /**
     * Menampilkan seluruh tiket.
     */
    public function index()
    {
        $tickets = Ticket::with([
            'user',
            'event',
            'ticketType',
            'order',
        ])
            ->latest()
            ->get();

        $totalTickets = $tickets->count();

        $activeTickets = $tickets
            ->where('status', 'active')
            ->count();

        $usedTickets = $tickets
            ->where('status', 'used')
            ->count();

        $cancelledTickets = $tickets
            ->where('status', 'cancelled')
            ->count();

        return view('admin.tickets.index', compact(
            'tickets',
            'totalTickets',
            'activeTickets',
            'usedTickets',
            'cancelledTickets'
        ));
    }

    /**
     * Menampilkan detail tiket.
     */
    public function show(Ticket $ticket)
    {
        $ticket->load([
            'user',
            'event',
            'ticketType',
            'order',
        ]);

        return view('admin.tickets.show', compact('ticket'));
    }

    /**
     * Menampilkan form edit tiket.
     */
    public function edit(Ticket $ticket)
    {
        $ticket->load([
            'user',
            'event',
            'ticketType',
            'order',
        ]);

        $users = User::orderBy('name')->get();

        $events = Event::orderBy('title')->get();

        $ticketTypes = TicketType::with('event')
            ->orderBy('name')
            ->get();

        return view('admin.tickets.edit', compact(
            'ticket',
            'users',
            'events',
            'ticketTypes'
        ));
    }

    /**
     * Memperbarui informasi tiket.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

            'event_id' => [
                'required',
                'integer',
                'exists:events,id',
            ],

            'ticket_type_id' => [
                'required',
                'integer',
                Rule::exists('ticket_types', 'id')
                    ->where(
                        'event_id',
                        $request->input('event_id')
                    ),
            ],

            'status' => [
                'required',
                Rule::in([
                    'active',
                    'used',
                    'cancelled',
                ]),
            ],
        ], [
            'user_id.required' => 'Pemilik tiket wajib dipilih.',
            'user_id.exists' => 'Pengguna yang dipilih tidak ditemukan.',

            'event_id.required' => 'Event wajib dipilih.',
            'event_id.exists' => 'Event yang dipilih tidak ditemukan.',

            'ticket_type_id.required' => 'Jenis tiket wajib dipilih.',
            'ticket_type_id.exists' => 'Jenis tiket tidak sesuai dengan event.',

            'status.required' => 'Status tiket wajib dipilih.',
            'status.in' => 'Status tiket tidak valid.',
        ]);

        $ticket->update([
            'user_id' => $validated['user_id'],
            'event_id' => $validated['event_id'],
            'ticket_type_id' => $validated['ticket_type_id'],
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('admin.tickets.index')
            ->with(
                'success',
                'Informasi tiket berhasil diperbarui!'
            );
    }

    /**
     * Menghapus tiket.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()
            ->route('admin.tickets.index')
            ->with(
                'success',
                'Tiket berhasil dihapus.'
            );
    }
}
