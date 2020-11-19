<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id_user', 
        'name',
        'username', 
        'password',
        'jk',
        'alamat',
        'level',
        'id_posyandu'
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    public function posyandu(){
        return $this->belongsTo('App\Posyandu', 'id_posyandu');
    }
    
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
