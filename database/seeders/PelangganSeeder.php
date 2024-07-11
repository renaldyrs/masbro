<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pelanggan = [
            ['nama' => 'Taufik', 'alamat' => 'Jl. Kramat Raya', 'nohp' => '08221232321', 'kelamin' => 'Laki-laki'],
            ['nama' => 'Salman', 'alamat' => 'Jl. Kramat Jaya 1', 'nohp' => '08192827271', 'kelamin' => 'Laki-laki'],


        ];

        DB::table('pelanggan')->insert($pelanggan);

    }
}
