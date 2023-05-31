<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mapel;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }

    public function edit(){
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('profile.edit', compact('kelas', 'mapel'));
    }

}
