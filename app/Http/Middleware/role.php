<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Memeriksa apakah pengguna sudah login dan apakah role sesuai
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        // Jika role tidak sesuai, redirect ke halaman yang diinginkan (misalnya dashboard)
        return redirect()->route('dashboard')->with('error', 'Akses ditolak.');
    }
}
