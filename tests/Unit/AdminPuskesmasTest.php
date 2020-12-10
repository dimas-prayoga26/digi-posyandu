<?php

namespace Tests\Unit;


use App\Admin;
use App\Puskesmas;
use Tests\TestCase;
class AdminPuskesmasTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
 public function testStore(){

 	$data = New Admin();
 	$data->username = "adm_puskesmas";
 	$data->password = "12345678";
 	$data->nama  =  "Andi";
 	$data->alamat = "Indramayu";
 	$data->jk 	= "laki-laki";
 	$data->id_puskesmas = 1;
 	$data->save();

 	 $this->assertDatabaseHas('admins', [
            'username'   		=> $data->username,
            'password'   		=> $data->password,     
            'nama'      		=> $data->nama,     
            'alamat'   			=> $data->alamat, 
            'jk'       			=> $data->jk,
            'id_puskesmas'     	=> $data->id_puskesmas,
        ]);

 }

}
