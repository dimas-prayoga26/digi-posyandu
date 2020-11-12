<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandarWho extends Model
{
    protected $table = 'standar_who';
    
    protected $fillable = [
        'id_standar_who',
		'parameter',
		'jk',
		'kategori',
		'sd_min_tiga',
		'sd_min_dua',
		'sd_min_satu',
		'median',
		'sd_plus_tiga',
		'sd_plus_dua',
		'sd_plus_satu'
		];
}
