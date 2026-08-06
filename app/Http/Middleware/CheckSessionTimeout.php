<?php

namespace App\Http\Middleware;

use \Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionTimeout
{
    /**
     */
    private const MAX_SESSION_TIME = 28800;// 28800 segundo es = 8 horas 

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $loginTime = session('login_time');

            if ($loginTime && (time() - $loginTime) > self::MAX_SESSION_TIME) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->with('error', 'Tu sesión ha caducado tras 8 horas. Por favor, inicia sesión de nuevo.');
            }
        }

        return $next($request);
    }
}