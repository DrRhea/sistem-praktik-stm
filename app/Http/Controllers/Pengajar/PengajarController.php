<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index() {
      return view('pengajar.index');
    }
}
