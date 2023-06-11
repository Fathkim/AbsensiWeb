<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Siswa;
use App\User;
use App\Absen;
use Carbon\CarbonTimeZone;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $currentUserName = auth()->user()->name;
        $absen = Absen::all();
        $date = Carbon::now(new CarbonTimeZone('Asia/Jakarta'));
        $hari = $date->format('d M Y');
        $waktu = $date->format('H:i A');
        return view('home.index', compact('hari', 'absen', 'waktu', 'currentUserName'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $date = Carbon::now(new CarbonTimeZone('Asia/Jakarta'));
        $nowdays = $date->format('d');

        // $input['barcode'] = $request->barcode;
        $siswa = Siswa::where('barcode', $request->barcode)->get();

        // $user = User::all();
        foreach($siswa as $u){
           $id_siswa = $u->id;
        }

        if ($id_siswa != $nowdays) {
            Absen::create([
                'id_siswa' => $id_siswa,
                'checkin' => $date,
            ]);
    
            return redirect('/home')->with('status', 'Absen Berhasil');
        } else {
            return redirect('/home')->with('status', 'Sepertinya Anda Sudah Absen Hari Ini');
        }
       
       
    }

    public function show()
    {
        $date = Carbon::now();
        $bulan = $date->format('F');
        return view('home.report', compact('bulan'));
    }
}
