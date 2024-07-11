<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $akun=[
            ['nama_akun'=>'Kas','kode_akun'=>'100'],
            ['nama_akun'=>'Modal Awal','kode_akun'=>'101'],
            ['nama_akun'=>'Gaji Pegawai','kode_akun'=>'200'],
            ['nama_akun'=>'Pendapatan','kode_akun'=>'300'],
            ['nama_akun'=>'Beban','kode_akun'=>'400'],
            ['nama_akun'=>'Beban Listrik','kode_akun'=>'401'],
            ['nama_akun'=>'Beban Air','kode_akun'=>'402'],
            
        ];

        DB::table('akun')->insert($akun);

        $this->command->info('Berhasil Menambahkan Data Akun');
        
    }
}
