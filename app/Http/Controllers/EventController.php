<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Menampilkan semua event aktif.
     */
    public function index(Request $request)
    {
        // Ambil hanya event yang aktif.
        $query = Event::where('status', true);

        // Filter kategori jika parameter category diisi.
        if ($request->filled('category')) {
            $category = strtolower(trim($request->query('category')));

            if (in_array($category, ['music', 'musik', 'concert', 'konser'])) {
                $query->where(function ($q) {
                    $q->where('category', 'LIKE', '%music%')
                      ->orWhere('category', 'LIKE', '%musik%')
                      ->orWhere('category', 'LIKE', '%concert%')
                      ->orWhere('category', 'LIKE', '%konser%')
                      ->orWhere('category', 'LIKE', '%pop%')
                      ->orWhere('category', 'LIKE', '%jazz%')
                      ->orWhere('category', 'LIKE', '%rock%')
                      ->orWhere('category', 'LIKE', '%indie%')
                      ->orWhere('category', 'LIKE', '%k-pop%')
                      ->orWhere('category', 'LIKE', '%kpop%')
                      ->orWhere('category', 'LIKE', '%edm%')
                      ->orWhere('category', 'LIKE', '%dj%')
                      ->orWhere('category', 'LIKE', '%orchestra%');
                });
            } else {
                $query->where('category', 'LIKE', '%' . $category . '%');
            }
        }

        $events = $query
            ->orderBy('event_date', 'asc')
            ->get();

        return view('events.index', compact('events'));
    }

    /**
     * Menampilkan detail event.
     */
    public function show(Event $event)
    {
        if (!$event->status) {
            abort(404);
        }

        $event->load('ticketTypes');

        return view('events.show', compact('event'));
    }
}