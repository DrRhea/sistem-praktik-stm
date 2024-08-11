<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AdminKelasController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index() {
    $kelas = Kelas::get();

    return view('admin.kelas.index', compact('kelas'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.kelas.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'jurusan' => 'required',
    ], [
      'jurusan.required' => 'Jurusan tidak boleh kosong',
    ]);

    $kelasX = Kelas::create([
      'kelas' => 'X',
      'jurusan' => $request->jurusan,
    ]);

    $kelasXI = Kelas::create([
      'kelas' => 'XI',
      'jurusan' => $request->jurusan,
    ]);

    $kelasXII = Kelas::create([
      'kelas' => 'XII',
      'jurusan' => $request->jurusan,
    ]);

    return redirect()->route('admin.kelas.index')->with('success', 'Data Kelas berhasil ditambahkan');
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
    // Mencari data kelas berdasarkan ID
    $kelas = Kelas::find($id);

    // Pengecekan apakah data kelas ditemukan
    if (!$kelas) {
      return redirect()->route('admin.kelas.index')->with('error', 'Data Kelas tidak ditemukan');
    }

    // Pengecekan apakah data kelas terkait dengan data praktik atau entitas lain
    if ($kelas->praktik()->exists()) {
      return redirect()->route('admin.kelas.index')->with('error', 'Data Kelas tidak bisa dihapus karena terkait dengan data praktik.');
    }

    // Menghapus data kelas
    $kelas->delete();

    // Mengembalikan respons redirect dengan pesan sukses
    return redirect()->route('admin.kelas.index')->with('success', 'Data Kelas berhasil dihapus');
  }
}
