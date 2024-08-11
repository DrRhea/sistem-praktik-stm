<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaNilaiController extends Controller
{
    public function index() {
      $user = Auth::user();
      $siswa = Siswa::where('user_id', $user->id)->first();
      $nilais = Nilai::where('siswa_id', $siswa->id)->with('praktik')->get();

      return view('siswa.nilai', compact('nilais'));
    }
}
