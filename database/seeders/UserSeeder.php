<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = [
            ['role' => '0','name' => 'Pemilik','email' => 'pemilik@laundry.com','password' => '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm'],
            ['role' => '1','name' => 'Admin','email' => 'admin@laundry.com','password' => '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm']];
            DB::table('users')->insert($user);
            $this->command->info('Berhasil Menambahkan Data User');

    }
}
