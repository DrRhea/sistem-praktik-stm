<?php

use Illuminate\Support\Facades\Route;

// Routes untuk Guest (tanpa middleware)
  Route::middleware([])->group(function () {
    // Tambahkan route di sini untuk Guest
  });

// Routes untuk Admin
  Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Tambahkan route di sini untuk Admin
  });

// Routes untuk Siswa
  Route::middleware(['auth', 'siswa'])->group(function () {
    // Tambahkan route di sini untuk Siswa
  });

// Routes untuk Pengajar
  Route::prefix('pengajar')->middleware(['auth', 'pengajar'])->group(function () {
    // Tambahkan route di sini untuk Pengajar
  });
