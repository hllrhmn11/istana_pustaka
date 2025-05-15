<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // <-- pastikan ini diimport

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {  // <-- pakai facade Auth
            return redirect()->route('login');
        }

        return $next($request);
    }
}
