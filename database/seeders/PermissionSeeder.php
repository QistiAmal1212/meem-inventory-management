<?php

namespace Database\Seeders;

use App\Models\References\Branch;
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
        Permission::firstOrCreate(['name' => 'view stock in out']);
        Permission::firstOrCreate(['name' => 'manage permisions and roles']);

        Permission::firstOrCreate(['name' => 'sales stock out']);

       $branches = Branch::all();

       foreach($branches as $branch)
       {
         Permission::firstOrCreate(['name' => $branch->name]);
       }
       Permission::firstOrCreate(['name' => 'all branch']);

        

    }

}
