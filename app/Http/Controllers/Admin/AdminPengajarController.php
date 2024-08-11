<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPengajarController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index() {
    $pengajars = Pengajar::with('user')->get();

    return view('admin.pengajar.index', compact('pengajars'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.pengajar.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validasi input
    $validatedData = $request->validate([
      'nama_lengkap' => 'required',
      'email' => 'required|email|unique:users,email',
      'telepon' => 'required',
      'foto_profile' => 'nullable|file|mimes:png,jpg,jpeg|max:2048', // Validasi foto_profile
    ], [
      'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
      'email.required' => 'Email wajib diisi',
      'email.email' => 'Format email tidak valid',
      'email.unique' => 'Email sudah terdaftar',
      'telepon.required' => 'Telepon wajib diisi',
      'foto_profile.file' => 'File harus berupa gambar',
      'foto_profile.mimes' => 'Format file harus png, jpg, atau jpeg',
      'foto_profile.max' => 'Ukuran file maksimal 2MB',
    ]);

    // Menangani file foto_profile jika ada
    $filename = null;
    if ($request->hasFile('foto_profile')) {
      $file = $request->file('foto_profile');
      $filename = time() . '_' . $file->getClientOriginalName();
      $file->move(public_path('img/photo_profile/'), $filename);
    }

    // Menyimpan data pengguna
    $user = User::create([
      'nama_lengkap' => $validatedData['nama_lengkap'],
      'email' => $validatedData['email'],
      'password' => Hash::make('password123'),
      'foto_profile' => $filename, // Menyimpan nama file foto profil
      'role' => 'pengajar',
    ]);

    // Mendapatkan NIP terakhir dari Pengajar (perhatikan cara Anda mengambil NIP terakhir)
    $lastPengajar = Pengajar::latest('nip')->first(); // Mengambil Pengajar dengan NIP terbesar
    $nip = $lastPengajar ? $lastPengajar->nip + 1 : 1001; // Jika tidak ada Pengajar, mulai dari 1001

    // Menyimpan data Pengajar
    Pengajar::create([
      'user_id' => $user->id,
      'nip' => $nip,
      'telepon' => $validatedData['telepon'],
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.pengajar.index')->with('success', 'Data Pengajar berhasil ditambahkan');
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
    $pengajar = Pengajar::with('user')->find($id);

    return view('admin.pengajar.update', compact('pengajar'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    // Temukan pengguna dan pengajar berdasarkan ID
    $pengajar = Pengajar::find($id);
    $user = User::find($pengajar->user_id);

    if (!$user || !$pengajar) {
      return redirect()->route('admin.pengajar.index')->with('error', 'Pengajar tidak ditemukan.');
    }

    // Validasi input dengan pengecualian untuk email yang sedang diperbarui
    $validatedData = $request->validate([
      'nama_lengkap' => 'required',
      'email' => 'required|email|unique:users,email,' . $user->id, // Menghindari konflik dengan email pengguna yang sama
      'telepon' => 'required',
      'foto_profile' => 'nullable|file|mimes:png,jpg,jpeg|max:2048', // Validasi foto_profile
    ], [
      'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
      'email.required' => 'Email wajib diisi',
      'email.email' => 'Format email tidak valid',
      'email.unique' => 'Email sudah terdaftar',
      'telepon.required' => 'Telepon wajib diisi',
      'foto_profile.file' => 'File harus berupa gambar',
      'foto_profile.mimes' => 'Format file harus png, jpg, atau jpeg',
      'foto_profile.max' => 'Ukuran file maksimal 2MB',
    ]);

    // Menangani file foto_profile jika ada
    $filename = $user->foto_profile;
    if ($request->hasFile('foto_profile')) {
      // Hapus file lama jika ada
      if ($filename && file_exists(public_path('img/photo_profile/' . $filename))) {
        unlink(public_path('img/photo_profile/' . $filename));
      }

      $file = $request->file('foto_profile');
      $filename = time() . '_' . $file->getClientOriginalName();
      $file->move(public_path('img/photo_profile/'), $filename);
    }

    // Memperbarui data pengguna
    $user->update([
      'nama_lengkap' => $validatedData['nama_lengkap'],
      'email' => $validatedData['email'],
      'foto_profile' => $filename, // Menyimpan nama file foto profil yang baru
    ]);

    // Memperbarui data pengajar
    $pengajar->update([
      'telepon' => $validatedData['telepon'],
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.pengajar.index')->with('success', 'Data Pengajar berhasil diperbarui');
  }

  public function resetPassword(Request $request, $id)
  {
    // Temukan pengajar berdasarkan ID
    $pengajar = Pengajar::find($id);

    // Pastikan pengajar ditemukan
    if (!$pengajar) {
      return redirect()->route('admin.pengajar.index')->with('error', 'Pengajar tidak ditemukan.');
    }

    // Temukan pengguna terkait
    $user = $pengajar->user;

    // Pastikan pengguna terkait ditemukan
    if (!$user) {
      return redirect()->route('admin.pengajar.index')->with('error', 'Pengguna terkait tidak ditemukan.');
    }

    // Reset password pengguna
    $user->password = Hash::make('password123'); // Set password default, ubah jika diperlukan
    $user->save();

    // Mengembalikan respons redirect dengan pesan sukses
    return redirect()->route('admin.pengajar.index')->with('success', 'Password pengajar berhasil direset.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Mencari data pengajar berdasarkan ID
    $pengajar = Pengajar::find($id);

    // Pengecekan apakah data pengajar ditemukan
    if (!$pengajar) {
      return redirect()->route('admin.pengajar.index')->with('error', 'Data Pengajar tidak ditemukan');
    }

    // Hapus foto profil jika ada
    if ($pengajar->user->foto_profile) {
      $filePath = public_path('img/photo_profile/' . $pengajar->user->foto_profile);
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    // Hapus data pengajar
    $pengajar->delete();

    // Hapus data pengguna terkait
    $pengajar->user()->delete();

    // Mengembalikan respons redirect dengan pesan sukses
    return redirect()->route('admin.pengajar.index')->with('success', 'Data Pengajar berhasil dihapus');
  }

}
