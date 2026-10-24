<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();

        $totalUsers = User::count();

        $totalOrders = Order::count();

        $totalTickets = Ticket::count();

        return view('admin.dashboard', compact(
            'totalEvents',
            'totalUsers',
            'totalOrders',
            'totalTickets'
        ));
    }
}