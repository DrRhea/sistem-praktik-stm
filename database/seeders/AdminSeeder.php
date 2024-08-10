<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Admin::create([
        'user_id' => User::where('email', 'admin@example.com')->first()->id,
        'status' => 'diterima',
      ]);

      Admin::create([
        'user_id' => User::where('email', 'sari.wulandari@example.com')->first()->id,
        'status' => 'diterima',
      ]);
    }
}
