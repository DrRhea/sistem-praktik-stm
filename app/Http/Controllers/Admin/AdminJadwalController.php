<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jadwal;
use App\Models\Pengajar;
use App\Models\Praktik;
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
      $praktiks = Praktik::all();

      return view('admin.jadwal.create', compact('praktiks'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'praktik_id' => 'required',
      'hari' => 'required',
      'jam_mulai' => 'required',
      'jam_selesai' => 'required|after:jam_mulai',
    ], [
      'praktik_id.required' => 'Harap pilih praktik',
      'hari.required' => 'Harap pilih hari',
      'jam_mulai.required' => 'Jam Mulai Wajib Diisi',
      'jam_selesai.required' => 'Jam Selesai Wajib Diisi',
      'jam_selesai.after' => 'Jam Selesai Harus Setelah Jam Mulai',
    ]);

    // Cari apakah jadwal sudah ada
    $jadwal = Jadwal::where('praktik_id', $validatedData['praktik_id'])
      ->first();

    if ($jadwal) {
      // Jika jadwal sudah ada, perbarui
      $jadwal->hari = $validatedData['hari'];
      $jadwal->jam_mulai = $validatedData['jam_mulai'];
      $jadwal->jam_selesai = $validatedData['jam_selesai'];
      $jadwal->save();
    } else {
      // Jika jadwal belum ada, buat baru
      $jadwal = Jadwal::create([
        'praktik_id' => $validatedData['praktik_id'],
        'hari' => $validatedData['hari'],
        'jam_mulai' => $validatedData['jam_mulai'],
        'jam_selesai' => $validatedData['jam_selesai'],
      ]);
    }

    return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal Berhasil Dibuat');
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
      $praktiks = Praktik::all();
      return view('admin.jadwal.update', compact('jadwal', 'praktiks'));
  }
  

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'praktik_id' => 'required',
      'hari' => 'required',
      'jam_mulai' => 'required',
      'jam_selesai' => 'required|after:jam_mulai',
    ], [
      'praktik_id.required' => 'Harap pilih praktik',
      'hari.required' => 'Harap pilih hari',
      'jam_mulai.required' => 'Jam Mulai Wajib Diisi',
      'jam_selesai.required' => 'Jam Selesai Wajib Diisi',
      'jam_selesai.after' => 'Jam Selesai Harus Setelah Jam Mulai',
    ]);

    // Cari jadwal berdasarkan ID
    $jadwal = Jadwal::find($id);

    // Perbarui jadwal dengan data yang baru
    $jadwal->praktik_id = $validatedData['praktik_id'];
    $jadwal->hari = $validatedData['hari'];
    $jadwal->jam_mulai = $validatedData['jam_mulai'];
    $jadwal->jam_selesai = $validatedData['jam_selesai'];
    $jadwal->save();

    return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal Berhasil Diperbarui');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Cari jadwal berdasarkan ID
    $jadwal = Jadwal::find($id);

    // Hapus jadwal tersebut
    $jadwal->delete();

    // Redirect ke halaman indeks dengan pesan sukses
    return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal Berhasil Dihapus');
  }
}
