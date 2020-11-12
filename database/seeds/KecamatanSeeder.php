<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kecamatan::create([
            'id_kecamatan' => 21807,
            'nama_kecamatan' => 'Widasari'
        ]);
    }
}
