<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $user = User::all();
        return view('user.index', compact('user'));
    }
    public function create() {
        $user = User::all();
        return view('user.create', compact('user'));
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);
    
        // Menggunakan $data untuk mengakses nilai input
        if (request()->input('password')) {
            $data['password'] = bcrypt(request()->input('password'));
        }
    
        User::create($data);
        return redirect('/create-user');
    }
}
