<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Vaksinasi;
class VaksinasiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $vaksinasi =Vaksinasi::create([
            'nama_vaksinasi' => 'HBO 0-24 Jam'
        ]);
        
        $this->assertDatabaseHas('vaksinasi', [
            'nama_vaksinasi' => 'HBO 0-24 Jam'
    ]);	
    }
}
