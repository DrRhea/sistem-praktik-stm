<?php

namespace Database\Seeders;

use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Pengajar::create([
        'user_id' => User::where('email', 'budi.santoso@example.com')->first()->id,
        'nip' => 1001,
        'telepon' => '081234567890',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'rina.kurniawati@example.com')->first()->id,
        'nip' => 1002,
        'telepon' => '081234567891',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'joko.prasetyo@example.com')->first()->id,
        'nip' => 1003,
        'telepon' => '081234567892',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'andi.susanto@example.com')->first()->id,
        'nip' => 1004,
        'telepon' => '081234567893',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'nia.putri@example.com')->first()->id,
        'nip' => 1005,
        'telepon' => '081234567894',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'hadi.suryanto@example.com')->first()->id,
        'nip' => 1006,
        'telepon' => '081234567895',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'lina.wati@example.com')->first()->id,
        'nip' => 1007,
        'telepon' => '081234567896',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'rina.dewi@example.com')->first()->id,
        'nip' => 1008,
        'telepon' => '081234567897',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'eka.ramadhan@example.com')->first()->id,
        'nip' => 1009,
        'telepon' => '081234567898',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'yudi.kurniawan@example.com')->first()->id,
        'nip' => 1010,
        'telepon' => '081234567899',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'maya.novita@example.com')->first()->id,
        'nip' => 1011,
        'telepon' => '081234568000',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'doni.prabowo@example.com')->first()->id,
        'nip' => 1012,
        'telepon' => '081234568001',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'vina.arista@example.com')->first()->id,
        'nip' => 1013,
        'telepon' => '081234568002',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'rudi.setiawan@example.com')->first()->id,
        'nip' => 1014,
        'telepon' => '081234568003',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'nina.sari@example.com')->first()->id,
        'nip' => 1015,
        'telepon' => '081234568004',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'yanto.widianto@example.com')->first()->id,
        'nip' => 1016,
        'telepon' => '081234568005',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'dewi.wulandari@example.com')->first()->id,
        'nip' => 1017,
        'telepon' => '081234568006',
      ]);

      Pengajar::create([
        'user_id' => User::where('email', 'susi.amalia@example.com')->first()->id,
        'nip' => 1018,
        'telepon' => '081234568007',
      ]);
    }
}
