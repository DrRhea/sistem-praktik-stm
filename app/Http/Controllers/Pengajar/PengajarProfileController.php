<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengajarProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $user = Auth::user();
      $pengajar = Pengajar::where('user_id', $user->id)->with('user')->first();

      return view('pengajar.profile', compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      // Validasi input
      $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'foto_profile' => 'nullable|file|mimes:jpg,jpeg,png|max:2024',
      ], [
        'nama_lengkap.required' => 'Nama lengkap wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah digunakan oleh pengguna lain',
        'foto_profile.mimes' => 'Format foto profil tidak valid. Hanya JPG, JPEG, PNG yang diperbolehkan',
        'foto_profile.max' => 'Foto profil terlalu besar. Maksimal 1MB',
      ]);

      $user = User::find($id);

      // Update data user
      $user->nama_lengkap = $request->input('nama_lengkap');
      $user->email = $request->input('email');

      // Menangani file foto_profile jika ada
      if ($request->hasFile('foto_profile')) {
        // Hapus foto profil lama jika ada
        if ($user->foto_profile && file_exists(public_path('img/photo_profile/' . $user->foto_profile))) {
          unlink(public_path('img/photo_profile/' . $user->foto_profile));
        }

        $file = $request->file('foto_profile');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/photo_profile/'), $filename);
        $user->foto_profile = $filename;
      }

      // Simpan perubahan
      $user->save();

      return redirect()->route('pengajar.profile.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
      // Validasi input
      $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:8|confirmed',
      ], [
        'current_password.required' => 'Kata sandi saat ini wajib diisi',
        'new_password.required' => 'Kata sandi baru wajib diisi',
        'new_password.min' => 'Kata sandi baru harus memiliki minimal 8 karakter',
        'new_password.confirmed' => 'Konfirmasi kata sandi tidak cocok',
      ]);

      $user = Auth::user();

      // Cek apakah kata sandi saat ini cocok dengan kata sandi yang tersimpan
      if (!Hash::check($request->input('current_password'), $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'Kata sandi saat ini tidak valid.']);
      }

      // Update kata sandi pengguna
      $user->password = Hash::make($request->input('new_password'));
      $user->save();

      return redirect()->route('pengajar.profile.index')->with('success', 'Kata sandi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
