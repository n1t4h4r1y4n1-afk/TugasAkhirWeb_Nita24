<?php

use Illuminate\Support\Facades\Route;

// =========================
// CONTROLLERS USER
// =========================

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;

// =========================
// CONTROLLERS ADMIN
// =========================

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CheckInController as AdminCheckInController;

// =========================
// CONTROLLERS AUTH
// =========================

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



// =====================================================
// HOME
// =====================================================
Route::get('/', [DashboardController::class, 'index'])
    ->name('home');



// =====================================================
// AUTH
// =====================================================

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);


// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);


// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// =====================================================
// DASHBOARD USER
// =====================================================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


// =====================================================
// EVENTS
// =====================================================

Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');

Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');


// =====================================================
// USER
// =====================================================

Route::middleware('auth')->group(function () {

    // Checkout tiket
    Route::get(
        '/checkout/{ticketType}',
        [OrderController::class, 'checkout']
    )->name('checkout');

    // Proses checkout
    Route::post(
        '/checkout/{ticketType}',
        [OrderController::class, 'store']
    )->name('checkout.store');

    // Tiket saya
    Route::get(
        '/my-tickets',
        [TicketController::class, 'index']
    )->name('tickets.index');

    // Detail tiket
    Route::get(
        '/ticket/{ticket}',
        [TicketController::class, 'show']
    )->name('tickets.show');

});


// =====================================================
// ADMIN
// =====================================================

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // ---------------------------------------------
        // Dashboard Admin
        // ---------------------------------------------

        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('dashboard');


        // ---------------------------------------------
        // Kelola Event
        // ---------------------------------------------

        Route::resource(
            '/events',
            AdminEventController::class
        );


        // ---------------------------------------------
        // Kelola Tiket
        // ---------------------------------------------

        Route::resource(
            '/tickets',
            AdminTicketController::class
        );


        // ---------------------------------------------
        // Kelola Jenis Tiket
        // ---------------------------------------------

        Route::resource(
            '/ticket-types',
            \App\Http\Controllers\Admin\TicketTypeController::class
        )->only([
            'index',
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]);


        // ---------------------------------------------
        // Pesanan
        // ---------------------------------------------

        Route::get(
            '/orders',
            [AdminOrderController::class, 'index']
        )->name('orders.index');

    });


// =====================================================
// PETUGAS PINTU MASUK
// =====================================================

Route::middleware(['auth', 'petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        // ---------------------------------------------
        // Halaman Scanner Petugas
        // ---------------------------------------------

        Route::get(
            '/scanner',
            [AdminCheckInController::class, 'index']
        )->name('scanner');


        // ---------------------------------------------
        // Proses Scan QR Petugas
        // ---------------------------------------------

        Route::post(
            '/scanner/check',
            [AdminCheckInController::class, 'check']
        )->name('scanner.check');

    });