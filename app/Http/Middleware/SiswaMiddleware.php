<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SiswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if (Auth::user()->role != 'siswa' && Auth::user()->role != 'admin')
        return redirect(route('pengajar'));
      else if (Auth::user()->role != 'siswa' && Auth::user()->role != 'pengajar')
        return redirect(route('admin'));

      return $next($request);
  }
}
