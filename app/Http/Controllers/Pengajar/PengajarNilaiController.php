<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pengajar;
use App\Models\Praktik;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajarNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
  {
    $user = Auth::user();

    $pengajar = Pengajar::where('user_id', $user->id)->first();

    if (!$pengajar) {
      return redirect()->route('some.route')->with('error', 'Pengajar tidak ditemukan');
    }

    $praktik = Praktik::where('pengajar_id', $pengajar->id)->get();

    $kelas = Kelas::whereIn('id', $praktik->pluck('kelas_id'))->get();

    $siswa = Siswa::whereIn('kelas_id', $praktik->pluck('kelas_id'))->get();

    return view('pengajar.nilai.index', compact('user', 'pengajar', 'kelas', 'siswa'));
  }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $siswa = Siswa::find($id);

        return view('pengajar.nilai.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
      $siswa = Siswa::find($id);

      $validatedData = $request->validate([
        'praktik_id' => 'required',
        'nilai' => 'required|numeric',
      ], [
        'praktik_id.required' => 'Praktik harus dipilih',
        'nilai.required' => 'Nilai tidak boleh kosong',
        'nilai.numeric' => 'Nilai harus berupa angka',
      ]);

      $nilai = Nilai::create([
        'siswa_id' => $id,
        'praktik_id' => $validatedData['praktik_id'],
        'nilai' => $validatedData['nilai'],
      ]);
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
