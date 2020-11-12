<?php

use Illuminate\Database\Seeder;

class PuseksmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Puskesmas::create([
            'id_puskesmas' => 1,
            'nama_puskesmas' => 'wds',
            'alamat' => 'null'
        ]);
    }
}
