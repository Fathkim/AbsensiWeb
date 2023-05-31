<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mapel;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
    
        return view('profile');
    }

    public function edit(){
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('profile-edit', compact('kelas', 'mapel'));
    }

}
