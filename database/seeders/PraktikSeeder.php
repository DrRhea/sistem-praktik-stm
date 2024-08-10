<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Pengajar;
use App\Models\Praktik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PraktikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
  {
    $praktikData = [
      'Teknik Komputer dan Jaringan' => [
        'Praktikum Jaringan Dasar' => 'Memahami dasar-dasar jaringan komputer, termasuk konfigurasi IP dan pengaturan perangkat jaringan.',
        'Praktikum Konfigurasi Router' => 'Mengatur dan mengonfigurasi router untuk jaringan lokal.',
        'Praktikum Keamanan Jaringan' => 'Memahami konsep keamanan jaringan dan cara melindungi jaringan dari serangan.',
      ],
      'Teknik Otomotif' => [
        'Praktikum Mesin Otomotif Dasar' => 'Pelatihan dasar pada mesin otomotif, termasuk teknik perawatan dan troubleshooting mesin.',
        'Praktikum Sistem Injeksi' => 'Memahami sistem injeksi pada kendaraan bermotor dan cara perawatannya.',
        'Praktikum Transmisi Manual' => 'Memahami cara kerja dan perawatan transmisi manual pada kendaraan.',
      ],
      'Teknik Elektro' => [
        'Praktikum Instalasi Listrik Dasar' => 'Memahami dan mengimplementasikan instalasi listrik pada bangunan sederhana.',
        'Praktikum Sistem Kontrol' => 'Mempelajari sistem kontrol otomatis pada rangkaian listrik.',
        'Praktikum Pembangkit Listrik' => 'Memahami konsep pembangkit listrik dan cara kerjanya.',
      ],
      'Teknik Mesin' => [
        'Praktikum Pengelasan Dasar' => 'Mempelajari teknik dasar pengelasan dan peralatan yang digunakan.',
        'Praktikum Pemesinan Dasar' => 'Mempelajari teknik pemesinan, termasuk bubut dan milling.',
        'Praktikum CAD/CAM' => 'Memahami penggunaan perangkat lunak CAD/CAM dalam desain dan manufaktur.',
      ],
      'Multimedia' => [
        'Praktikum Pengolahan Gambar' => 'Pengolahan gambar menggunakan perangkat lunak multimedia untuk pembuatan video dan animasi.',
        'Praktikum Desain Grafis' => 'Mempelajari dasar-dasar desain grafis menggunakan perangkat lunak desain.',
        'Praktikum Video Editing' => 'Mempelajari teknik editing video untuk pembuatan konten multimedia.',
      ],
      'Rekayasa Perangkat Lunak' => [
        'Praktikum Pemrograman Web' => 'Memahami dasar-dasar pemrograman web, termasuk HTML, CSS, dan JavaScript.',
        'Praktikum Database' => 'Memahami konsep database, termasuk perancangan dan implementasi menggunakan SQL.',
        'Praktikum Pengembangan Aplikasi Mobile' => 'Mempelajari dasar-dasar pengembangan aplikasi mobile menggunakan bahasa pemrograman tertentu.',
      ],
    ];

    $pengajarList = Pengajar::all();
    $pengajarIndex = 0;

    foreach ($praktikData as $jurusan => $praktiks) {
      // Ambil semua kelas dengan jurusan ini
      $kelasList = Kelas::where('jurusan', $jurusan)->get();

      foreach ($kelasList as $kelas) {
        foreach ($praktiks as $judul => $deskripsi) {
          Praktik::create([
            'pengajar_id' => $pengajarList[$pengajarIndex % $pengajarList->count()]->id,
            'kelas_id' => $kelas->id,
            'judul' => $judul,
            'deskripsi' => $deskripsi,
          ]);

          // Increment pengajarIndex to ensure different instructors for different practices
          $pengajarIndex++;
        }
      }
    }
  }
}
