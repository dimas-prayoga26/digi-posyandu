<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';
    
    protected $fillable = [
        'no_kk',
		'nik_ayah',
		'nik_ibu',
		'nama_ayah',
		'nama_ibu',
		'no_telp',
		'status_ekonomi',
		'alamat',
		'id_desa'

		];
	public function desa(){
        return $this->belongsTo('App\Desa', 'id_desa');
    }
}