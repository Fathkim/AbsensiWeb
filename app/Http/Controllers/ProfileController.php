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
    public function index()
    {
        $data = Siswa::all();
        return view('profile.profile', compact('data'));
    }

    public function edit(){
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('profile.edit', compact('kelas', 'mapel'));
    }

    public function store(Request $request){
        $data = $request->all();
        Siswa::create($data);
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/profile')->with('success', 'Profile berhasil diupdate');
    }

}
