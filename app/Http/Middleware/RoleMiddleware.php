<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
{
    if (Auth::check() && in_array(Auth::user()->jabatan, $roles)) {
        return $next($request);
    }
    return redirect('/')->withErrors(['access' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
}
}
