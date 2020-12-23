<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Hash;

class PasswordTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_encrypt()
    {
        $password = "12345678";
        $data = new User();
		$data->username = "Alfa";
		$data->name  = "Alfa";
		$data->password = $password;
		$data->jk 	= "laki-laki";
		$data->alamat = "Indramayu";
		$data->id_posyandu = 1;
		$data->level ="kader";
		$data->save();

        if(Hash::check($password, $data->password)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }

    }
}
