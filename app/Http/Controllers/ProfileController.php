<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mapel;
use App\Profile;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Siswa::where('id_user', auth()->user()->id)->get();
        return view('profile.profile', compact('data'));
    }

    public function edit($id){
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        return view('profile.edit', compact('kelas', 'siswa'));
    }

    public function update(Request $request, $id){
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/profile')->with('success', 'Profile berhasil diupdate');
    }

}
