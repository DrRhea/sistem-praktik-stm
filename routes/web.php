<?php

  use App\Http\Controllers\Admin\AdminApproveController;
  use App\Http\Controllers\Admin\AdminController;
  use App\Http\Controllers\Admin\AdminJadwalController;
  use App\Http\Controllers\Admin\AdminKelasController;
  use App\Http\Controllers\Admin\AdminNilaiController;
  use App\Http\Controllers\Admin\AdminPengajarController;
  use App\Http\Controllers\Admin\AdminPraktikController;
  use App\Http\Controllers\Admin\AdminProfileController;
  use App\Http\Controllers\Admin\AdminSiswaController;
  use App\Http\Controllers\Auth\LoginController;
  use App\Http\Controllers\Auth\LogoutController;
  use App\Http\Controllers\Auth\RegisterController;
  use App\Http\Controllers\Pengajar\PengajarController;
  use App\Http\Controllers\Pengajar\PengajarNilaiController;

  use App\Http\Controllers\Pengajar\PengajarProfileController;

  use App\Http\Controllers\Siswa\SiswaController;
  use App\Http\Controllers\Siswa\SiswaNilaiController;
  use App\Http\Controllers\Siswa\SiswaProfileController;
  use Illuminate\Support\Facades\Route;

// Routes untuk Guest (tanpa middleware)
  Route::middleware(['guest'])->group(function () {
    Route::get('auth/login/', [LoginController::class, 'index'])->name('login');
    Route::post('auth/login/', [LoginController::class, 'login'])->name('login.post');

    Route::get('auth/register/', [RegisterController::class, 'index'])->name('register');
    Route::post('auth/register/', [RegisterController::class, 'register'])->name('register.post');
  });

  Route::middleware(['auth'])->group(function () {
    Route::post('/', [LogoutController::class, 'logout'])->name('logout.post');
  });

// Routes untuk Admin
  Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('praktik/', [AdminPraktikController::class, 'index'])->name('admin.praktik.index');
    Route::get('praktik/tambah', [AdminPraktikController::class, 'create'])->name('admin.praktik.create');
    Route::post('praktik/', [AdminPraktikController::class, 'store'])->name('admin.praktik.store');
    Route::get('praktik/ubah/{id}', [AdminPraktikController::class, 'edit'])->name('admin.praktik.edit');
    Route::put('praktik/ubah/{id}', [AdminPraktikController::class, 'update'])->name('admin.praktik.update');
    Route::delete('praktik/hapus/{id}', [AdminPraktikController::class, 'destroy'])->name('admin.praktik.delete');


    Route::get('kelas/', [AdminKelasController::class, 'index'])->name('admin.kelas.index');
    Route::get('kelas/tambah', [AdminKelasController::class, 'create'])->name('admin.kelas.create');
    Route::post('kelas/', [AdminKelasController::class, 'store'])->name('admin.kelas.store');
    Route::get('kelas/ubah/{id}', [AdminKelasController::class, 'edit'])->name('admin.kelas.edit');
    Route::put('kelas/ubah/{id}', [AdminKelasController::class, 'update'])->name('admin.kelas.update');
    Route::delete('kelas/hapus/{id}', [AdminKelasController::class, 'destroy'])->name('admin.kelas.delete');

    Route::get('jadwal/', [AdminJadwalController::class, 'index'])->name('admin.jadwal.index');
    Route::get('jadwal/tambah', [AdminJadwalController::class, 'create'])->name('admin.jadwal.create');
    Route::post('jadwal/', [AdminJadwalController::class, 'store'])->name('admin.jadwal.store');
    Route::get('jadwal/ubah/{id}', [AdminJadwalController::class, 'edit'])->name('admin.jadwal.edit');
    Route::put('jadwal/ubah/{id}', [AdminJadwalController::class, 'update'])->name('admin.jadwal.update');
    Route::delete('jadwal/hapus/{id}', [AdminJadwalController::class, 'destroy'])->name('admin.jadwal.delete');

    Route::get('siswa/', [AdminSiswaController::class, 'index'])->name('admin.siswa.index');
    Route::get('siswa/tambah', [AdminSiswaController::class, 'create'])->name('admin.siswa.create');
    Route::post('siswa/', [AdminSiswaController::class, 'store'])->name('admin.siswa.store');
    Route::get('siswa/ubah/{id}', [AdminSiswaController::class, 'edit'])->name('admin.siswa.edit');
    Route::put('siswa/ubah/{id}', [AdminSiswaController::class, 'update'])->name('admin.siswa.update');
    Route::patch('siswa/reset/{id}', [AdminSiswaController::class, 'resetPassword'])->name('admin.siswa.resetPassword');
    Route::delete('siswa/hapus/{id}', [AdminSiswaController::class, 'destroy'])->name('admin.siswa.delete');

//    Route::get('nilai/', [AdminNilaiController::class, 'index'])->name('admin.nilai.index');
//    Route::get('nilai/tambah', [AdminNilaiController::class, 'create'])->name('admin.nilai.create');
//    Route::post('nilai/', [AdminNilaiController::class, 'store'])->name('admin.nilai.store');
//    Route::get('nilai/ubah/{id}', [AdminNilaiController::class, 'edit'])->name('admin.nilai.edit');
//    Route::put('nilai/ubah/{id}', [AdminNilaiController::class, 'update'])->name('admin.nilai.update');
//    Route::delete('nilai/hapus/{id}', [AdminNilaiController::class, 'destroy'])->name('admin.nilai.delete');

    Route::get('pengajar/', [AdminPengajarController::class, 'index'])->name('admin.pengajar.index');
    Route::get('pengajar/tambah', [AdminPengajarController::class, 'create'])->name('admin.pengajar.create');
    Route::post('pengajar/', [AdminPengajarController::class, 'store'])->name('admin.pengajar.store');
    Route::get('pengajar/ubah/{id}', [AdminPengajarController::class, 'edit'])->name('admin.pengajar.edit');
    Route::put('pengajar/ubah/{id}', [AdminPengajarController::class, 'update'])->name('admin.pengajar.update');
    Route::patch('pengajar/reset/{id}', [AdminPengajarController::class, 'resetPassword'])->name('admin.pengajar.resetPassword');
    Route::delete('pengajar/hapus/{id}', [AdminPengajarController::class, 'destroy'])->name('admin.pengajar.delete');

    Route::get('approve/', [AdminApproveController::class, 'index'])->name('admin.approve.index');
    Route::patch('approve/terima/{id}', [AdminApproveController::class, 'terima'])->name('admin.approve.terima');
    Route::patch('approve/tolak/{id}', [AdminApproveController::class, 'tolak'])->name('admin.approve.tolak');

    Route::get('profile/', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::put('profile/update/{id}', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::patch('profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.updatePassword');
  });

// Routes untuk Siswa
  Route::middleware(['auth', 'siswa'])->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/nilai', [SiswaNilaiController::class, 'index'])->name('siswa.nilai.index');

    Route::get('profile/', [SiswaProfileController::class, 'index'])->name('siswa.profile.index');
    Route::put('profile/update/{id}', [SiswaProfileController::class, 'update'])->name('siswa.profile.update');
    Route::patch('profile/update/password', [SiswaProfileController::class, 'updatePassword'])->name('siswa.profile.updatePassword');
  });

// Routes untuk Pengajar
  Route::prefix('pengajar')->middleware(['auth', 'pengajar'])->group(function () {
    Route::get('/', [PengajarController::class, 'index'])->name('pengajar');

    Route::get('/nilai', [PengajarNilaiController::class, 'index'])->name('pengajar.nilai.index');
    Route::get('/nilai/tambah/{id}', [PengajarNilaiController::class, 'create'])->name('pengajar.nilai.create');
    Route::get('/nilai/tambah/{id}', [PengajarNilaiController::class, 'store'])->name('pengajar.nilai.store');

    Route::get('profile/', [PengajarProfileController::class, 'index'])->name('pengajar.profile.index');
    Route::put('profile/update/{id}', [PengajarProfileController::class, 'update'])->name('pengajar.profile.update');
    Route::patch('profile/update/password', [PengajarProfileController::class, 'updatePassword'])->name('pengajar.profile.updatePassword');
  });

