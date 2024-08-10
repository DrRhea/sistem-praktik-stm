<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      /* _____________________________ 2 Admin _____________________________ */
      User::create([
        'nama_lengkap' => 'Andi Purnomo',
        'email' => 'andi.purnomo@example.com',
        'password' => Hash::make('password123'),
        'role' => 'admin',
      ]);

      User::create([
        'nama_lengkap' => 'Sari Wulandari',
        'email' => 'sari.wulandari@example.com',
        'password' => Hash::make('password123'),
        'role' => 'admin',
      ]);

      /* _____________________________ 18 Pengajar _____________________________ */
      User::create([
        'nama_lengkap' => 'Budi Santoso',
        'email' => 'budi.santoso@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Rina Kurniawati',
        'email' => 'rina.kurniawati@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Joko Prasetyo',
        'email' => 'joko.prasetyo@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Andi Susanto',
        'email' => 'andi.susanto@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Nia Putri',
        'email' => 'nia.putri@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Hadi Suryanto',
        'email' => 'hadi.suryanto@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Lina Wati',
        'email' => 'lina.wati@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Rina Dewi',
        'email' => 'rina.dewi@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Eka Ramadhan',
        'email' => 'eka.ramadhan@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Yudi Kurniawan',
        'email' => 'yudi.kurniawan@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Maya Novita',
        'email' => 'maya.novita@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Doni Prabowo',
        'email' => 'doni.prabowo@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Vina Arista',
        'email' => 'vina.arista@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Rudi Setiawan',
        'email' => 'rudi.setiawan@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Nina Sari',
        'email' => 'nina.sari@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Yanto Widianto',
        'email' => 'yanto.widianto@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Dewi Wulandari',
        'email' => 'dewi.wulandari@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);

      User::create([
        'nama_lengkap' => 'Susi Amalia',
        'email' => 'susi.amalia@example.com',
        'password' => Hash::make('password123'),
        'role' => 'pengajar',
      ]);
    }
}
