<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'anak';
    
    protected $fillable = [
        'id_anak', 
        'nik',
        'nama_anak',
        'tgl_lahir',
        'jk',
        'anak_ke',
        'bb_lahir',
        'pp_lahir',
        'kia',
        'imd',
        'no_kk',
        'id_posyandu'
        ];

        public function posyandu(){
        return $this->belongsTo('App\Posyandu', 'id_posyandu');
    }
}
