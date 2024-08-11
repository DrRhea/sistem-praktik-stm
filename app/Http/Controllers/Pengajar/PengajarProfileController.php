<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\Request;

use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

=======
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
>>>>>>> b6955914344b9fc774f56dd72f4dae8605bda43e

class PengajarProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD

        //

=======
>>>>>>> b6955914344b9fc774f56dd72f4dae8605bda43e
      $user = Auth::user();
      $pengajar = Pengajar::where('user_id', $user->id)->with('user')->first();

      return view('pengajar.profile', compact('pengajar'));
<<<<<<< HEAD

=======
>>>>>>> b6955914344b9fc774f56dd72f4dae8605bda43e
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
