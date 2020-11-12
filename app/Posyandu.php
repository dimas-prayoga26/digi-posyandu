<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
	protected $table = 'posyandu';
    
    protected $fillable = [
        'id_posyandu',
		'nama_posyandu',
		'id_desa',
		'id_puskesmas'
		];

	public function desa(){
        return $this->belongsTo('App\Desa', 'id_desa');
    public function id_puskesmas(){
        return $this->belongsTo('App\Puskesmas', 'id_puskesmas');
    }
    }
}
