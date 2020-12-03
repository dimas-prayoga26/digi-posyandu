<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusGizi extends Model
{
    protected $table = 'status_gizi';
	
	protected $primaryKey = 'id_status_gizi';

    protected $fillable = [
        'id_status_gizi',
		'bb_u',
		'pb_tb_u',
		'bb_pb_tb'
	];
	public function gizi()
	{
	 return $this->hasOne('App\Gizi', 'id_status_gizi');
	}
}
