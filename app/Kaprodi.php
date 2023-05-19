<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
    protected $table = 'kaprodi';
    protected $guarded = [];
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan', 'id_jurusan');
    }
    
}
