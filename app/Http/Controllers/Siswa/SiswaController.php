<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Praktik;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index() {
      $user = Auth::user();

      // Dapatkan data siswa yang terhubung dengan user yang sedang login
            $siswa = Siswa::where('user_id', $user->id)->first();

      // Dapatkan kelas siswa
            $kelas = Kelas::where('id', $siswa->kelas_id)->first();

      // Dapatkan semua praktik yang terkait dengan kelas tersebut
            $praktik = Praktik::where('kelas_id', $kelas->id)->get();

      // Dapatkan jadwal berdasarkan semua praktik yang terkait
            $jadwal = Jadwal::whereIn('praktik_id', $praktik->pluck('id'))->get();

      // Mengirim data ke view
            return view('siswa.index', compact('jadwal'));
    }
}
