<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }


    /**
     * Proses login
     */
    public function login(Request $request)
    {
        // Validasi form
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        /*
         * Pastikan akun yang sebelumnya login
         * benar-benar dikeluarkan terlebih dahulu.
         *
         * Ini penting ketika user berpindah akun
         * dari USER -> ADMIN atau ADMIN -> USER.
         */
        if (Auth::check()) {
            Auth::logout();
        }


        // Coba login dengan akun yang baru
        if (Auth::attempt($credentials)) {

            // Regenerasi session untuk keamanan
            $request->session()->regenerate();


            // =========================================
            // ADMIN
            // =========================================

            if (Auth::user()->role === 'admin') {

                return redirect()
                    ->route('admin.dashboard');
            }


            // =========================================
            // PETUGAS
            // =========================================

            if (Auth::user()->role === 'petugas') {

                return redirect()
                    ->route('petugas.scanner');
            }


            // =========================================
            // USER BIASA
            // =========================================

            return redirect()
                ->route('dashboard');
        }


        /*
         * Kalau login gagal, pastikan tidak ada
         * akun lama yang masih tersimpan di session.
         */
        Auth::logout();


        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }


    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login');
    }
}