<?php

namespace Database\Seeders;

use App\Models\References\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'superadmin']);
        $admin->givePermissionTo(Permission::all());

        $staff = Role::firstOrCreate(['name' => 'staff']);
        $staff->givePermissionTo(Permission::where('name', 'like', 'view %')->get());

        $manager = Role::firstOrCreate(['name' => 'manager']);
        $manager->givePermissionTo(Permission::firstOrCreate(['name' => 'view products']));
        $manager->givePermissionTo(Permission::firstOrCreate(['name' => 'view stocks']));
        $manager->givePermissionTo(Permission::firstOrCreate(['name' => 'view repositories']));
        $manager->givePermissionTo(Permission::firstOrCreate(['name' => 'manage users']));
        $manager->givePermissionTo(Permission::firstOrCreate(['name' => 'manage products']));
        $manager->givePermissionTo(Permission::firstOrCreate(['name' => 'manage stocks']));
        $manager->givePermissionTo(Permission::firstOrCreate(['name' => 'manage repositories']));
            
        $sales = Role::firstOrCreate(['name' => 'sales']);
        $sales->givePermissionTo(Permission::firstOrCreate(['name' => 'sales stock out']));
    }
}
