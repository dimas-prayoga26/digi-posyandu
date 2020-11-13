<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    
    use Notifiable;

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    
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

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}