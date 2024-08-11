<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
      return view('auth.login');
    }

  public function login(Request $request)
  {
    // Validasi input
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8',
    ], [
      'email.required' => 'Email harus diisi.',
      'email.email' => 'Format email tidak valid.',
      'password.required' => 'Kata sandi harus diisi.',
      'password.min' => 'Kata sandi harus minimal 8 karakter.',
    ]);

    // Ambil data dari request
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $request->email)->first();
    if($user->role == 'admin') {
      $admin = Admin::where('user_id', $user->id)->first();

      if ($admin && $admin->status == 'pending') {
        return back()->with('warning', 'Akun Anda masih pending. Harap tunggu konfirmasi dari admin.');
      }
    }

    // Cek kredensial dan login
    if (Auth::attempt($credentials)) {
      // Jika sukses login, redirect ke halaman dashboard
      return redirect()->intended('admin')->with('success', 'Login berhasil!');
    }

    // Jika gagal login, kembali ke halaman login dengan pesan error
    return back()->withErrors([
      'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
    ])->onlyInput('email');
  }
}
