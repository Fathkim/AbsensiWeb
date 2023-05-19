<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $table = 'users';
     protected $guarded = [];

     protected $appends = ['hashid'];

     public function getHashidAttribute()
     {
         return Hashids::encode($this->attributes['id']);
     }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Multyper User
    public function isAdmin()
    {
        return $this->level === 'admin';
    }

    public function isGuru()
    {
        return $this->level === 'guru';
    }

    public function isKaprodi()
    {
        return $this->level === 'kaprodi';
    }

    public function isSiswa()
    {
        return $this->level === 'siswa';
    }

}
