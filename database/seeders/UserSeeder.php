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
        //
        DB::beginTransaction();
        try {

            $pemilik = User::create([
                'role' => '0','name' => 'Pemilik',
                'email' => 'pemilik@laundry.com',
                'password' => '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm']);
    
            $admin = User::create([
                'role' => '1','name' => 'Admin',
                'email' => 'admin@laundry.com',
                'password' => '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm']);
            
                
            $this->command->info('Berhasil Menambahkan Data User');
    
            $role_pemilik = Role::create(['role' => '0']);
            $role_admin = Role::create(['role' => '1']); 
    
            $permission = Permission::create(['name' => 'read role']);
            
            $pemilik->assignRole('0');
            $admin->assignRole('1');

        } catch (\Throwable $th) {
            DB::rollBack();
        }
        
        
    }
}
