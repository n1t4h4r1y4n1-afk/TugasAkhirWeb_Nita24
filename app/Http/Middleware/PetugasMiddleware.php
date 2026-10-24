<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetugasMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kalau belum login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Kalau bukan petugas
        if (auth()->user()->role !== 'petugas') {
            abort(403, 'Anda tidak memiliki akses sebagai petugas.');
        }

        return $next($request);
    }
}