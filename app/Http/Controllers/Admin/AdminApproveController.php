<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::with('user')->get();

        return view('admin.approve.index', compact('admins'));
    }

  public function terima(Request $request, $id)
  {
    $admin = Admin::find($id);

    if ($admin && $admin->status === 'pending') {
      $admin->status = 'diterima';
      $admin->save();

      return redirect()->route('admin.approve.index')
        ->with('success', 'Admin berhasil diterima');
    }

    return redirect()->route('admin.approve.index')
      ->with('error', 'Gagal menerima admin');
  }

  public function tolak(Request $request, $id)
    {
      $admin = Admin::find($id);

      if ($admin && $admin->status === 'pending') {
        $admin->status = 'ditolak';
        $admin->save();

        return redirect()->route('admin.approve.index')
          ->with('success', 'Admin berhasil ditolak');
      }

      return redirect()->route('admin.approve.index')
        ->with('error', 'Gagal menerima admin');
    }
}
