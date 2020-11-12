<?php

use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Desa::create([
            'id_desa' => 1,
            'nama_desa' => 'widasari',
            'rt' => 1,
            'rw' => 2,
            'id_kecamatan' => 21807
        ]);
    }
}
