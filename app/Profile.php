<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan', 'id_jurusan');
    }
    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'id_mapel');
    }
    public function guru()
    {
        return $this->belongsTo('App\Guru', 'id_guru');
    }
    public function kapordi()
    {
        return $this->belongsTo('App\Kaprodi', 'id_kapordi');
    }
    public function absen()
    {
        return $this->belongsTo('App\Absen', 'id_absen');
    }
}
