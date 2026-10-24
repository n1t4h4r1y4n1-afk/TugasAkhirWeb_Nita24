<?php

namespace App\Http\Controllers;

use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua event yang aktif
        $events = Event::where('status', true)
            ->orderBy('event_date', 'asc')
            ->get();

        // Kirim data event ke halaman landing
        return view('landing', compact('events'));
    }
}