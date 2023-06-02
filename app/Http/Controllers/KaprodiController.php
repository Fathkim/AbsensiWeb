<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jurusan;
use App\Kaprodi;
use Illuminate\Support\Facades\Validator;

class KaprodiController extends Controller
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
    public function kaprodi()
    {
        $kaprodi = kaprodi::all();
        return view('user.kaprodi.index', compact('kaprodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $user = User::leftJoin('kaprodi', 'users.id','kaprodi.id_user')

        ->where('kaprodi.id_user',null)
        ->where('level','kaprodi')
        ->get();
        $usert = User::where('level', 'kaprodi')->sum('id');
        $kaprodi = kaprodi::where('id_user', $usert);


        return view('user.kaprodi.addbio', compact('kaprodi', 'jurusan', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Memanggil data user, Memanggil data kaprodi, Memanggil data mapel
        
        $data = $request->all();
        
        $dataKaprodi = [
            'id_user' => $data['id_user'],
            'id_jurusan' => $data['id_jurusan'],
        ];

        if($request->hasFile('photo')){
            $destination_path = 'public/kaprodi'; //path tempat penyimpanan (storage/public/images/profile)
            $image = $request -> file('photo'); //mengambil request column photo
            $image_name = $image->getClientOriginalName(); //memberikan nama gambar yang akan disimpan di foto
            $path = $request->file('photo')->storeAs($destination_path, $image_name); //mengirimkan foto ke folder store
            $dataKaprodi['photo'] = $image_name; //mengirimkan ke database
        }

        Kaprodi::create($dataKaprodi);
        
        
        // Redirect
        return redirect()->route('kaprodi')->with('success', 'Data berhasil diupdate');
        
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
        $jurusan = Jurusan::all();
        $user = User::find($id);
        $kaprodi = kaprodi::find($id);
        return view('user.kaprodi.edit', compact('kaprodi', 'jurusan', 'user'));
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
        $kaprodi = Kaprodi::find($id);
        // $mapel = Mapel::all();
        
        $data = $request->all();

        $dataUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'level' => $data['level'],
            'password' => $data['password']
        ];
        // kalo kosong gunakan password lama jika tidak kosong gunakan password baru dan hash password
        if($data['password'] == null){
            $dataUser['password'] = $user->password;
        }else{
            $dataUser['password'] = bcrypt($data['password']);
        }

        
        $dataKaprodi = [
            'id_user' => Auth()->user()->id,
            'id_jurusan' => $data['id_jurusan'],
        ];

        if($request->hasFile('photo')){
            $destination_path = 'public/kaprodi'; //path tempat penyimpanan (storage/public/images/profile)
            $image = $request -> file('photo'); //mengambil request column photo
            $image_name = $image->getClientOriginalName(); //memberikan nama gambar yang akan disimpan di foto
            $path = $request->file('photo')->storeAs($destination_path, $image_name); //mengirimkan foto ke folder store
            $dataKaprodi['photo'] = $image_name; //mengirimkan ke database
        }

        $user->update($dataUser);
        // Kaprodi::update($dataKaprodi);
        
        
        // Redirect
        return redirect()->route('kaprodi')->with('success', 'Data berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clear($id)
    {
        $kaprodi = kaprodi::find($id);
        $user = User::find($id);
        $user->delete();
        return redirect('/kaprodi');
    }
}
