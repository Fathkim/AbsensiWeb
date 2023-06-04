<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mapel;
use App\Guru;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function guru()
     {
         $user = User::all();
         $guru = Guru::all();
         $mapel = Mapel::all();
         return view('user.guru.index', compact('user', 'mapel', 'guru'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::all();
        $user = User::find($id);
        $guru = Guru::find($id);
        return view('user.guru.edit', compact('user', 'mapel', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Memanggil data user, Memanggil data kaprodi, Memanggil data mapel
        $user = User::find($id);
        $guru = Guru::find($id);
        $mapel = Mapel::all();
        
        // Mengambil data dari form
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        
        // Cek apakah password kosong
        if ($request->password == null) {
            // Jika kosong, maka password tetap
            $user->password = $user->password;
        } else {
        // Jika tidak kosong, maka lakukan validation dan password akan di-hash
            $this->validate($request, [
                'password' => 'required|min:6'
            ]);
            $user->password = bcrypt($request->password);
        }

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('photo')) {
            // Jika ada, maka foto akan diupload
            $photoWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($photoWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('/public/guru/', $filenameSimpan);
        } else {
            // Jika tidak ada, maka foto akan diisi dengan foto default
            // $kaprodi->photo = 'images/icon-web.png';
        }
        
        // Simpan data
        $user->save();
        // $kaprodi->save();
        
        // Redirect
        return redirect()->route('guru')->with('success', 'Data berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Guru = guru::find($id);
        $user = User::find($id);
        $user->delete();
        return redirect('/guru');
    }
}
