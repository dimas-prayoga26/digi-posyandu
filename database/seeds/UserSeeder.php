<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'kader',
            'username' => 'kader123',
            'password' => bcrypt('kader123'),
            'jk' => 'laki-laki',
            'alamat' => 'indramayu',
            'level' => 'kader',
            'id_posyandu' => 1
        ]);
    }
}
