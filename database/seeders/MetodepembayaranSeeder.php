<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodepembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $metode = [
            ['pembayaran' => 'Transfer','namabank' => 'BCA','kodebank' => '184171819'],
            ['pembayaran' => 'Transfer','namabank' => 'Mandiri','kodebank' => '189271912'],
            ['pembayaran' => 'Transfer','namabank' => 'BNI','kodebank' => '092827831'],
            ['pembayaran' => 'Transfer','namabank' => 'BRI','kodebank' => '892172811'],
            
        ];
        
        DB::table('metodepembayaran')->insert($metode);

        $this->command->info('Berhasil Menambahkan Data Metode');
    }
}
