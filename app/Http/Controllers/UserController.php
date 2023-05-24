<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mapel;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $user = User::all();
        $mapel = Mapel::all();
        return view('user.index', compact('user', 'mapel'));
    }
    public function create() {
        $user = User::all();
        return view('user.create', compact('user'));
    }

    public function store()
    {
        $date = Carbon::now();
        $bulanDanTanggal = $date->format('F j');

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required|min:5',
        ]);
    
        // Menggunakan $data untuk mengakses nilai input
        if (request()->input('password')) {
            $data['password'] = bcrypt(request()->input('password'));
        }
        
        if(request()->input('employe_since')) {
            $data['employe_since'] = $bulanDanTanggal;
        }
    
        User::create($data);
        return redirect('/create-user');
    }
}
