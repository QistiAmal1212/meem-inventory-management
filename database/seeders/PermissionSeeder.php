<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'view users']);
        Permission::firstOrCreate(['name' => 'view products']);
        Permission::firstOrCreate(['name' => 'view stocks']);
        Permission::firstOrCreate(['name' => 'view repositories']);

        Permission::firstOrCreate(['name' => 'manage users']);
        Permission::firstOrCreate(['name' => 'manage products']);
        Permission::firstOrCreate(['name' => 'manage stocks']);
        Permission::firstOrCreate(['name' => 'manage repositories']);

        Permission::firstOrCreate(['name' => 'view audit logs']);
        Permission::firstOrCreate(['name' => 'manage permisions and roles']);

        Permission::firstOrCreate(['name' => 'handle branch bangi']);
        Permission::firstOrCreate(['name' => 'handle branch shah alam']);
        Permission::firstOrCreate(['name' => 'handle branch cheras']);
        Permission::firstOrCreate(['name' => 'handle branch penang']);

        

    }

}
