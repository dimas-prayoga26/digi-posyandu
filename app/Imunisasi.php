<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    protected $table = 'imunisasi';
    
    protected $primaryKey = 'no_pemeriksaan_gizi';

	protected $keyType = 'string'; 

    protected $fillable = [
                'no_pemeriksaan_imunisasi',
		'tgl_imunisasi',
		'id_vaksinasi',
		'id_anak'
	];

	public function vaksinasi(){
        return $this->belongsTo('App\Vaksinasi', 'id_vaksinasi');
    }
    
    public function anak(){
        return $this->belongsTo('App\Anak', 'id_anak');
    }
}
