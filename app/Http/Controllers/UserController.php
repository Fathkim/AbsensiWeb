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
    public function create() {
        $user = User::all();
        return view('user.create', compact('user'));
    }

    public function store()
    {
        $date = Carbon::now();
        $bulanDanTanggal = $date->format('d F Y');
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
        $data['barcode'] = $number;

        User::create($data);
        return redirect('/create-user');
    }

    public function mapelStore(Request $request)
    {
        $data = $request->all();
        Mapel::create($data);
        return redirect('/create-user');
    }
}