<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Posyandu;
use Illuminate\Support\Fascades\Hash;

class KaderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
	public function testStore(){

		$data = new User();
		$data->username = "kader";
		$data->name  = "Alex";
		$data->password = "12345678";
		$data->jk 	= "laki-laki";
		$data->alamat = "Indramayu";
		$data->id_posyandu = 1;
		$data->level ="kader";
		$data->save();



		$this->assertDatabaseHas('users', [
            'username'   		=> $data->username,
            'password'   		=> $data->password,     
            'name'      		=> $data->name,     
            'alamat'   			=> $data->alamat, 
            'jk'       			=> $data->jk,
            'id_posyandu'     	=> $data->id_posyandu,
            'level'				=> $data->level
        ]);
	}
}
