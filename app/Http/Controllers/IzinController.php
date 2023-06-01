<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Izin;

class IzinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('izin');
    }

    public function store(Request $request){
        Izin::create($request -> all());
        return redirect('/home');
    }
}
