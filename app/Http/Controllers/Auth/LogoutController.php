<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

  public function logout(Request $request) {
    // Menghapus sesi autentikasi pengguna
    Auth::logout();

    // Menghapus token pengguna dari sesi jika menggunakan API (opsional)
    $request->session()->invalidate();

    // Menyegarkan sesi pengguna
    $request->session()->regenerateToken();

    // Mengarahkan pengguna ke halaman beranda atau halaman login setelah logout
    return redirect()->route('login')->with('status', 'Anda telah berhasil logout');
  }
}
