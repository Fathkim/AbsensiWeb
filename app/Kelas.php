<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan', 'id_jurusan');
    }
}
