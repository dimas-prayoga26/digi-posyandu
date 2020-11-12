<?php

use Illuminate\Database\Seeder;

class PosyanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Posyandu::create([
            'id_posyandu' => 1,
            'nama_posyandu' => 'wds',
            'id_desa' => 1,
            'id_puskesmas' => 1
        ]);
    }
}
