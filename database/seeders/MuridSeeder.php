<?php

namespace Database\Seeders;

use App\Models\Murid;
use Illuminate\Database\Seeder;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Murid::create([
            'nama' => 'Laha',
            'umur' => '13',
            'alamat' => 'Langring',
            'sekolah' => 'MTS Darussholah',
        ]);
    }
}
