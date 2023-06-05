<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Siswa;
use App\Kelas;

class SiswaController extends Controller
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
     public function siswa()
     {
         $user = User::all();
         $siswa = Siswa::all();
         return view('user.siswa.index', compact('user', 'siswa'));
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
        $kelas = Kelas::all();
        $data = $request->all();

        $dataSiswa = [
            'id_user' => $data['id_user'],
            'id_kelas' => $data['id_kelas'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'nis' => $data['nis'],
            'nisn' => $data['nisn'],
        ];


        if($request->hasFile('photo')){
            $destination_path = 'public/siswa'; //path tempat penyimpanan (storage/public/images/profile)
            $image = $request -> file('photo'); //mengambil request column photo
            $image_name = $image->getClientOriginalName(); //memberikan nama gambar yang akan disimpan di foto
            $path = $request->file('photo')->storeAs($destination_path, $image_name); //mengirimkan foto ke folder store
            $dataSiswa['photo'] = $image_name; //mengirimkan ke database
        }

        Siswa::create($dataSiswa);
        return redirect()->route('siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $siswa = Siswa::where('id_user',$id)->get()->all();
        $kelas = Kelas::all();
        return view('user.siswa.detail', compact('siswa', 'user', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
