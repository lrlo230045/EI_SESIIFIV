<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
    if (auth()->check() && !auth()->user()->active) {
        auth()->logout();
        return redirect('/auth')->with('error', 'Usuario inactivo');
    }
    return $next($request);
}
}
