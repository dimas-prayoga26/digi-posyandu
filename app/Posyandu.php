<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    protected $table = 'posyandu';
    protected $primaryKey = 'id_posyandu';
    protected $fillable = [
        'id_posyandu', 'nama_posyandu', 'id_puskesmas', 'id_desa',
    ];
}
