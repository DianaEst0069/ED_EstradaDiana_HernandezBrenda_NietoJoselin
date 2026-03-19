<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Validar si el usuario tiene sesión activa
        if(!Auth::check()){
            return redirect()->route('registro')
            ->with('error', 'Se debe registrar e iniciar sesión');
        }

        //Validar si el usuario actual es administrador
        if(!Auth::user()->is_admin){
            return redirect()->route('libros.index')
            ->with('error', 'No cuentas con permisos de administrador');
        }

        return $next($request);
    }
}
