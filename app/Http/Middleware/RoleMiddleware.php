<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles  // bisa menerima banyak role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Belum login, arahkan ke halaman login
            return redirect()->route('login');
        }

        // Cek apakah user punya salah satu role yang diijinkan
        if (!in_array(Auth::user()->role, $roles)) {
            // Kalau role tidak cocok, bisa redirect atau abort 403
            abort(403, 'Akses ditolak: Anda tidak punya hak untuk membuka halaman ini.');
        }

        return $next($request);
    }
}
