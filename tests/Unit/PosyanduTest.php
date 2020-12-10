<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Desa;
use App\Puskesmas;
use App\Posyandu;

class PosyanduTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreate()
    {
    
        $data = new Posyandu();
        $data->nama_posyandu =  'Bougenville I';
        $data->id_desa       = 1;
        $data->id_puskesmas  = 1;
        $data->save();

       
        $this->assertDatabaseHas('posyandu', [
            'nama_posyandu' =>  $data->nama_posyandu,
            'id_desa'       =>  $data->id_desa ,
            'id_puskesmas'  =>  $data->id_puskesmas
    ]);	
    }
}
