<?php

namespace App\Http\Middleware;

use \Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionTimeout
{
    /**
     * 28800 segundo = 8 horas 
     * 18000 segundos = 5 horas
     * 600 segundos = 10 minutos
     * 300 segundos = 5 minutos
     * 60 segundos = 1 minuto
     */
    private const MAX_SESSION_TIME = 28800;// Agregar segundos para definir el tiempo de sesion por usuario

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $loginTime = session('login_time');

            if ($loginTime && (time() - $loginTime) > self::MAX_SESSION_TIME) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                $seconds = self::MAX_SESSION_TIME;
                return redirect()->route('login')->with('error', "Tu sesión ha caducado tras 8 horas. Por favor, inicia sesión de nuevo.");
            }
        }

        return $next($request);
    }
}