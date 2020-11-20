<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
	protected $table = 'puskesmas';
	
	protected $primaryKey = 'id_puskesmas';

    protected $fillable = [
        'id_puskesmas',
		'nama_puskesmas',
		'alamat'
	];

	/* public function admin(){
		return $this->belongsTo('App\Admin', 'id_admin');
	} */
}