<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
     protected $table = 'kecamatan';
    
    protected $fillable = [
        'id_kecamatan',
		'nama_kecamatan'
		];
}
