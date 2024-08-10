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
      } elseif ($user->role != 'pengajar' && $user->role != 'siswa') {
        $admin = Admin::where('user_id', $user->id)->first();

        if($admin && $admin->status == 'pending')
          return redirect(route('admin.pending'));
        elseif ($admin && $admin->status == 'diterima')
          return redirect(route('admin'));
        elseif ($admin && $admin->status == 'ditolak')
          return redirect(route('admin.ditolak'));

      }

        return $next($request);
    }
}
