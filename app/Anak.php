<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'anak';
    
    protected $primaryKey = 'id_anak';

    protected $fillable = [
        'id_anak', 
        'nik',
        'nama_anak',
        'tgl_lahir',
        'jk',
        'anak_ke',
        'bb_lahir',
        'pb_lahir',
        'kia',
        'imd',
        'no_kk',
        'id_posyandu'
        ];

    public function posyandu(){
        return $this->belongsTo('App\Posyandu', 'id_posyandu');
    }

    public function keluarga(){
        return $this->belongsTo('App\Keluarga', 'no_kk');
    }
}
