<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PengajarMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if (Auth::user()->role != 'pengajar' && Auth::user()->role != 'admin')
        return redirect(route(''));
      else if (Auth::user()->role != 'pengajar' && Auth::user()->role != 'siswa')
        return redirect(route(''));

        return $next($request);
    }
}
