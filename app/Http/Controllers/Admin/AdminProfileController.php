<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function index() {
      $user = Auth::user();
      $admin = Admin::where('user_id', $user->id)->with('user')->first();

      return view('admin.profile.index', compact('admin'));
    }
}
