<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Menampilkan semua tiket milik user
     */
    public function index()
    {
        $tickets = Ticket::where(
            'user_id',
            Auth::id()
        )
            ->with([
                'event',
                'ticketType',
                'order'
            ])
            ->latest()
            ->get();

        return view(
            'tickets.index',
            compact('tickets')
        );
    }


    /**
     * Menampilkan detail tiket
     */
    public function show(Ticket $ticket)
    {
        // User hanya boleh melihat tiket miliknya
        if ($ticket->user_id !== Auth::id()) {
            abort(403);
        }

        $ticket->load([
            'event',
            'ticketType',
            'order',
            'user'
        ]);

        return view(
            'tickets.show',
            compact('ticket')
        );
    }
}