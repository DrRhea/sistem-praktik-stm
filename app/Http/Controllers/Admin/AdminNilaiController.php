<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Praktik;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminNilaiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index() {
//    $nilais = Nilai::with('siswa')->with('praktik')->get();
    $siswas = Siswa::with('user')->get();

    return view('admin.nilai.index', compact('siswas'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $siswas = Siswa::all();
    $praktiks = Praktik::all();

    return view('admin.nilai.create', compact('siswas', 'praktiks'));
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
  public function edit(string $id)
  {
    //
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
