<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
	
	protected $primaryKey = 'id_desa';

    protected $fillable = [
        'id_desa',
		'nama_desa',
		'rt',
		'rw',
		'id_kecamatan'
	];

	public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'id_kecamatan');
    }
}
