<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jenis = [
            ['jenis' => 'Cuci Basah', 'kg' => '1000 gram', 'harga' => '3500', 'hari' => '2'],
            ['jenis' => 'Cuci Kering', 'kg' => '1000 gram', 'harga' => '4000', 'hari' => '2'],
            ['jenis' => 'Cuci Setrika', 'kg' => '1000 gram', 'harga' => '4500', 'hari' => '3'],
            ['jenis' => 'Setrika', 'kg' => '1000 gram', 'harga' => '5000', 'hari' => '2'],

        ];

        DB::table('jenis')->insert($jenis);
        $this->command->info('Berhasil Menambahkan Data Akun');
    }
}
