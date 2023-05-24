<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table = 'izin';
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
