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
    protected $fillable = [
        'id_user', 'name', 'username', 'password', 'jk', 'alamat', 'level', 'id_posyandu'
    ];

    public function posyandu(){
        return $this->belongsTo('App\Posyandu', 'id_posyandu');
    }
}
