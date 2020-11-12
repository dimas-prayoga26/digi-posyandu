<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaksinasi extends Model
{
    protected $table = 'vaksinasi';
    protected $fillable = [
        'id_vaksinasi', 
        'nama_vaksinasi', 
 
    ];
}
