<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Gate::allows('is_admin')) {
            return $next($request);
        }

        // Redireciona ou exibe uma mensagem de erro se o usuário não for admin
        return redirect('/users')->with('error', 'Você não tem permissão para acessar esta página.');
    }
}
