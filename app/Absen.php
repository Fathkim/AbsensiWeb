<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
