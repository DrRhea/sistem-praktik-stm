<?php

  use App\Http\Controllers\Admin\AdminController;
  use App\Http\Controllers\Auth\LoginController;
  use App\Http\Controllers\Auth\RegisterController;
  use App\Http\Controllers\Pengajar\PengajarController;
  use App\Http\Controllers\Siswa\SiswaController;
  use Illuminate\Support\Facades\Route;

// Routes untuk Guest (tanpa middleware)
  Route::middleware([])->group(function () {
    Route::get('auth/login/', [LoginController::class, 'index'])->name('login');
    Route::post('auth/login/', [LoginController::class, 'login'])->name('login.post');

    Route::get('auth/register/', [RegisterController::class, 'index'])->name('register');
    Route::post('auth/register/', [RegisterController::class, 'register'])->name('register.post');
  });

// Routes untuk Admin
  Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
  });

// Routes untuk Siswa
  Route::middleware(['auth', 'siswa'])->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('siswa');
  });

  Route::get('/test', function () {
    return view('admin.index');
  });

// Routes untuk Pengajar
  Route::prefix('pengajar')->middleware(['auth', 'pengajar'])->group(function () {
    Route::get('/', [PengajarController::class, 'index'])->name('pengajar');
  });
