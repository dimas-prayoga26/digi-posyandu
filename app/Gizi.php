<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gizi extends Model
{
	protected $table = 'gizi';
	
	protected $primaryKey = 'no_pemeriksaan_gizi';
	
	public $incrementing = false;
	
	protected $keyType = 'string'; 

    protected $fillable = [   
		'no_pemeriksaan_gizi',
		'usia',
		'pb_tb',
		'bb',
		'tgl_periksa',
		'cara_ukur',
		'asi_eks',
		'vit_a',
		'validasi',
		'id_status_gizi',
		'id_anak'
	];

	public function status_gizi(){
        return $this->belongsTo('App\StatusGizi', 'id_status_gizi');
    }

    public function anak(){
        return $this->belongsTo('App\Anak', 'id_anak');
    }
}
