<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
	protected $table = 'puskesmas';
    
    protected $fillable = [
        'id_puskesmas',
		'nama_puskesmas',
		'alamat'
		];
}
