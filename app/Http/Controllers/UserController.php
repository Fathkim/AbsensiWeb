<?php

namespace App\Http\Controllers;

use App\User;
use App\Mapel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Hashids\Hashids;


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
        
        $bulanDanTanggal = $date->format('d F Y');
        // id user yang mengacak
        $number = random_int(10000000, 99999999);

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'level' => 'required',
            'password' => 'required|min:6',
        ]);
        
        if (request()->input('password')) {
            $data['password'] = bcrypt(request()->input('password'));
        }

        // Mengatur nilai employe_since secara otomatis
        $data['employe_since'] = $bulanDanTanggal;
        
        // menghash number yang sudah diacak
        $data['barcode'] = $number;

        // // session()->flash('success', 'Data berhasil diupdate');

        User::create($data);
        return redirect('/create-user');

    }

}