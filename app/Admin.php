<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admin';
    
    protected $fillable = [
        'id_admin', 
        'username', 
        'password', 
        'nama', 
        'jk', 
        'level', 
        'alamat', 
        'id_puskesmas'
    ];

    public function puskesmas(){
        return $this->belongsTo('App\Puskesmas', 'id_puskesmas');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
