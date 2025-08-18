<?php

namespace Database\Seeders;

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


                // Branch Manager (Bangi)
                $branchManagerBangi = Role::firstOrCreate(['name' => 'branch manager bangi']);
                $branchManagerBangi->givePermissionTo(Permission::firstOrCreate(['name' => 'view products']));
                $branchManagerBangi->givePermissionTo(Permission::firstOrCreate(['name' => 'view stocks']));
                $branchManagerBangi->givePermissionTo(Permission::firstOrCreate(['name' => 'view repositories']));
                $branchManagerBangi->givePermissionTo(Permission::firstOrCreate(['name' => 'manage users']));
                $branchManagerBangi->givePermissionTo(Permission::firstOrCreate(['name' => 'manage products']));
                $branchManagerBangi->givePermissionTo(Permission::firstOrCreate(['name' => 'manage stocks']));
                $branchManagerBangi->givePermissionTo(Permission::firstOrCreate(['name' => 'manage repositories']));
                $branchManagerBangi->givePermissionTo(Permission::firstOrCreate(['name' => 'handle branch bangi']));
        
                // Branch Manager (Shah Alam)
                $branchManagerShahAlam = Role::firstOrCreate(['name' => 'branch manager shah alam']);
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view products']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view stocks']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view repositories']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage products']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage stocks']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage repositories']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'handle branch shah alam']));

                // Branch Manager (Cheras)
                $branchManagerShahAlam = Role::firstOrCreate(['name' => 'branch manager cheras']);
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view products']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view stocks']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view repositories']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage products']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage stocks']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage repositories']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'handle branch cheras']));

                // Branch Manager (Cheras)
                $branchManagerShahAlam = Role::firstOrCreate(['name' => 'branch manager penang']);
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view products']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view stocks']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'view repositories']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage products']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage stocks']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'manage repositories']));
                $branchManagerShahAlam->givePermissionTo(Permission::firstOrCreate(['name' => 'handle branch penang']));
    }
}
