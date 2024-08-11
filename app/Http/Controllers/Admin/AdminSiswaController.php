<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminSiswaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index() {
    $siswas = Siswa::with('user')->with('kelas')->get();

    return view('admin.siswa.index', compact('siswas'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $kelas = Kelas::all();

    return view('admin.siswa.create', compact('kelas'));
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
      'foto_profile' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
      'kelas_id' => 'required|exists:kelas,id',
    ], [
      'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
      'email.required' => 'Email wajib diisi',
      'email.email' => 'Format email tidak valid',
      'email.unique' => 'Email sudah terdaftar',
      'foto_profile.file' => 'File harus berupa gambar',
      'foto_profile.mimes' => 'Format file harus png, jpg, atau jpeg',
      'foto_profile.max' => 'Ukuran file maksimal 2MB',
      'kelas_id.required' => 'Kelas wajib dipilih',
      'kelas_id.exists' => 'Kelas tidak ditemukan',
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
      'password' => Hash::make('password123'), // Password default
      'foto_profile' => $filename,
      'role' => 'siswa',
    ]);

    // Mendapatkan tahun saat ini dan tahun depan
    $currentYear = date('y'); // Format 2 digit tahun saat ini, misalnya '24'
    $nextYear = $currentYear + 1; // Tahun depan

    // Mendapatkan NIS terakhir dari Siswa untuk tahun ini dan tahun depan
    $lastSiswa = Siswa::where(function ($query) use ($currentYear, $nextYear) {
      $query->where('nis', 'LIKE', "$currentYear%")
        ->orWhere('nis', 'LIKE', "$nextYear%");
    })->latest('nis')->first();

    // Menentukan angka urut untuk NIS
    $lastNis = $lastSiswa ? (int) substr($lastSiswa->nis, -4) : 0;
    $nextNisNumber = str_pad($lastNis + 1, 4, '0', STR_PAD_LEFT);

    // Menentukan NIS baru
    $nis = $currentYear . $nextYear . $nextNisNumber;

    // Menyimpan data Siswa
    Siswa::create([
      'user_id' => $user->id,
      'kelas_id' => $validatedData['kelas_id'],
      'nis' => $nis,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.siswa.index')->with('success', 'Data Siswa berhasil ditambahkan');
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
    $siswa = Siswa::with('user')->with('kelas')->find($id);
    $kelas = Kelas::all();

    return view('admin.siswa.update', compact('siswa', 'kelas'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  public function resetPassword(Request $request, $id)
  {
    // Temukan pengajar berdasarkan ID
    $siswa = Siswa::find($id);

    // Pastikan siswa ditemukan
    if (!$siswa) {
      return redirect()->route('admin.siswa.index')->with('error', 'Siswa tidak ditemukan.');
    }

    // Temukan pengguna terkait
    $user = $siswa->user;

    // Pastikan pengguna terkait ditemukan
    if (!$user) {
      return redirect()->route('admin.siswa.index')->with('error', 'Pengguna terkait tidak ditemukan.');
    }

    // Reset password pengguna
    $user->password = Hash::make('password123'); // Set password default, ubah jika diperlukan
    $user->save();

    // Mengembalikan respons redirect dengan pesan sukses
    return redirect()->route('admin.siswa.index')->with('success', 'Password siswa berhasil direset.');
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Mencari data pengajar berdasarkan ID
    $siswa = Siswa::find($id);

    // Pengecekan apakah data siswa ditemukan
    if (!$siswa) {
      return redirect()->route('admin.siswa.index')->with('error', 'Data Siswa tidak ditemukan');
    }

    // Hapus foto profil jika ada
    if ($siswa->user->foto_profile) {
      $filePath = public_path('img/photo_profile/' . $siswa->user->foto_profile);
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    // Hapus data siswa
    $siswa->delete();

    // Hapus data pengguna terkait
    $siswa->user()->delete();

    // Mengembalikan respons redirect dengan pesan sukses
    return redirect()->route('admin.siswa.index')->with('success', 'Data Siswa berhasil dihapus');
  }
}
