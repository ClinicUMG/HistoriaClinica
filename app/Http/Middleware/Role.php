<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = 'administrador')
    {
        //Evaluar si el usuario está identificado
        if (!auth()->check()) {
            abort(403);
        }
        //Evaluar si el usuario tiene un determinado rol
        $roles = explode('-', $role);
        if ($request->user()->has_any_role($roles)) {
            return $next($request);
        } else{
            abort(403);
        }
    }
}
