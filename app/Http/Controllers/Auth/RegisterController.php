<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function index() {
    return view('auth.register');
  }

  public function register(Request $request) {
    $validatedData = $request->validate([
      'nama_lengkap' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8|confirmed',
    ], [
      'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
      'email.required' => 'Email wajib diisi',
      'email.unique' => 'Email sudah terdaftar',
      'password.required' => 'Password wajib diisi',
      'password.min' => 'Password minimal 8 karakter',
      'password.confirmed' => 'Konfirmasi Password harus sama',
    ]);

    $user = User::create([
      'nama_lengkap' => $validatedData['nama_lengkap'],
      'email' => $validatedData['email'],
      'password' => Hash::make($validatedData['password']),
    ]);

    $admin = Admin::create([
      'user_id' => $user->id,
      'status' => 'pending',
    ]);

    return redirect()->route('login')->with('warning', 'Harap tunggu konfirmasi dari admin.');
  }
}
