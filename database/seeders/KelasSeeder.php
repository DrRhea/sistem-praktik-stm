<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $kelasData = [
        ['kelas' => 'X', 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['kelas' => 'X', 'jurusan' => 'Teknik Otomotif'],
        ['kelas' => 'X', 'jurusan' => 'Teknik Elektro'],
        ['kelas' => 'X', 'jurusan' => 'Teknik Mesin'],
        ['kelas' => 'X', 'jurusan' => 'Multimedia'],
        ['kelas' => 'X', 'jurusan' => 'Rekayasa Perangkat Lunak'],
        ['kelas' => 'XI', 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['kelas' => 'XI', 'jurusan' => 'Teknik Otomotif'],
        ['kelas' => 'XI', 'jurusan' => 'Teknik Elektro'],
        ['kelas' => 'XI', 'jurusan' => 'Teknik Mesin'],
        ['kelas' => 'XI', 'jurusan' => 'Multimedia'],
        ['kelas' => 'XI', 'jurusan' => 'Rekayasa Perangkat Lunak'],
        ['kelas' => 'XII', 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['kelas' => 'XII', 'jurusan' => 'Teknik Otomotif'],
        ['kelas' => 'XII', 'jurusan' => 'Teknik Elektro'],
        ['kelas' => 'XII', 'jurusan' => 'Teknik Mesin'],
        ['kelas' => 'XII', 'jurusan' => 'Multimedia'],
        ['kelas' => 'XII', 'jurusan' => 'Rekayasa Perangkat Lunak'],
      ];

      // Insert data ke tabel kelas
      foreach ($kelasData as $data) {
        Kelas::create($data);
      }
    }
}
