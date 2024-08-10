<?php

namespace App\Http\Middleware;

use App\Models\Admin;
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
      $user = Auth::user();

      if ($user->role != 'pengajar' && $user->role != 'admin') {
        return redirect(route('siswa'));
      } else if ($user->role != 'pengajar' && $user->role != 'siswa') {
        $admin = Admin::where('user_id', $user->id)->first();

        if($admin && $admin->status == 'pending') {
          return redirect(route('admin.pending'));
        }

        return redirect(route('admin'));
      }

        return $next($request);
    }
}
