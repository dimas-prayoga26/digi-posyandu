<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Superadmin extends Authenticatable
{

    use Notifiable;

    protected $table = 'superadmin';
       
    protected $fillable = [
    	'id_superadmin', 'nama', 'email_admin', 'password','no_tlp','jk','foto','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value){
    	$this->attributes['password'] = bcrypt($value);
    }
}
