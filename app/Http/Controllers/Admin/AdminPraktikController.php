<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pengajar;
use App\Models\Praktik;
use Illuminate\Http\Request;

class AdminPraktikController extends Controller
{
    public function index() {
      $praktiks = Praktik::with('pengajar')->with('kelas')->get();

      return view('admin.praktik.index', compact('praktiks'));
    }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $pengajars = Pengajar::all();
    $kelas = Kelas::all();

    return view('admin.praktik.create', compact('pengajars', 'kelas'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'judul' => 'required',
      'deskripsi' => 'required',
      'pengajar_id' => 'required',
      'kelas_id' => 'required',
    ], [
      'judul.required' => 'Judul tidak boleh kosong',
      'deskripsi.required' => 'Deskripsi tidak boleh kosong',
      'pengajar_id.required' => 'Pengajar tidak boleh kosong',
      'kelas_id.required' => 'Kelas tidak boleh kosong',
    ]);

    $praktik = Praktik::create([
      'judul' => $validatedData['judul'],
      'deskripsi' => $validatedData['deskripsi'],
      'pengajar_id' => $validatedData['pengajar_id'],
      'kelas_id' => $validatedData['kelas_id'],
    ]);

    return redirect()->route('admin.praktik.index')->with('success', 'Data Kegiatan Praktik berhasil ditambah');
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
    $praktik = Praktik::find($id)->with('pengajar')->with('kelas')->first();

    $pengajars = Pengajar::all();
    $kelas = Kelas::all();

    return view('admin.praktik.update', compact('praktik', 'pengajars', 'kelas'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $validatedData = $request->validate([
      'judul' => 'required',
      'deskripsi' => 'required',
      'pengajar_id' => 'required',
      'kelas_id' => 'required',
    ], [
      'judul.required' => 'Judul tidak boleh kosong',
      'deskripsi.required' => 'Deskripsi tidak boleh kosong',
      'pengajar_id.required' => 'Pengajar tidak boleh kosong',
      'kelas_id.required' => 'Kelas tidak boleh kosong',
    ]);

    $praktik = Praktik::find($id);

    $praktik->update([
      'judul' => $validatedData['judul'],
      'deskripsi' => $validatedData['deskripsi'],
      'pengajar_id' => $validatedData['pengajar_id'],
      'kelas_id' => $validatedData['kelas_id'],
    ]);

    return redirect()->route('admin.praktik.index')->with('success', 'Data Kegiatan Praktik berhasil diupdate');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Mencari data praktik berdasarkan ID
    $praktik = Praktik::find($id);

    // Pengecekan apakah praktik terkait dengan data lain (misalnya pengajar atau kelas)
    if ($praktik->pengajar()->exists() || $praktik->kelas()->exists()) {
      // Jika terkait, kembalikan pesan error
      return redirect()->route('admin.praktik.index')->with('error', 'Data Praktik tidak bisa dihapus karena terkait dengan data lain');
    }

    // Menghapus data praktik
    $praktik->delete();

    // Mengembalikan respons redirect dengan pesan sukses
    return redirect()->route('admin.praktik.index')->with('success', 'Data Praktik berhasil dihapus');
  }
}
