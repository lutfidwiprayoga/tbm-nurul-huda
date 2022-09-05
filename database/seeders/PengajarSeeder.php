<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajars')->delete();

        $pengajar = array(
            array('id' => '1', 'nama' => 'Nabila', 'alamat' => 'Rogojampi', 'no_hp' => '082213239542', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'nama' => 'Rifki', 'alamat' => 'Muncar', 'no_hp' => '081223134451', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'nama' => 'Fatimah', 'alamat' => 'Probolingo', 'no_hp' => '083842145512', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'nama' => 'Ela', 'alamat' => 'Songgon', 'no_hp' => '082334256672', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'nama' => 'Zidan', 'alamat' => 'Songgon', 'no_hp' => '081339356565', 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('pengajars')->insert($pengajar);
    }
}
