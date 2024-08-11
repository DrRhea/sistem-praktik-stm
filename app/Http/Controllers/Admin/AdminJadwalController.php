<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jadwal;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminJadwalController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index() {
    $jadwals = Jadwal::with('praktik')->get();

    return view('admin.jadwal.index', compact('jadwals'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
      $pengajars = Pengajar::all(); // Ambil semua data pengajar
      $jadwals = Jadwal::all(); // Ambil semua data jadwal, jika diperlukan

      return view('admin.jadwal.create', compact('pengajars', 'jadwals'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
      $jadwal = Jadwal::findOrFail($id);
      $pengajars = Pengajar::all();
      return view('admin.jadwal.update', compact('jadwal', 'pengajars'));
  }
  

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
