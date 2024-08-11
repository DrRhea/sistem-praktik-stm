<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaProfileController extends Controller
{
    public function index() {
      $user = Auth::user();
      $siswa = Siswa::where('user_id', $user->id)->with('user')->first();

      return view('siswa.profile', compact('siswa'));
    }
}
