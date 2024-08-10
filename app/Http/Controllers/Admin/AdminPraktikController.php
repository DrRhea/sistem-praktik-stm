<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Praktik;
use Illuminate\Http\Request;

class AdminPraktikController extends Controller
{
    public function index() {
      $praktiks = Praktik::with('pengajar')->with('kelas')->get();

      return view('admin.praktik.index', compact('praktiks'));
    }
}
