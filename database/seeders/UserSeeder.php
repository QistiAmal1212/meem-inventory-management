<?php

namespace Database\Seeders;

use App\Models\References\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@memeinventory.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('superadmin');

        // Staff User
        $staff = User::firstOrCreate(
            ['email' => 'staff@memeinventory.com'],
            [
                'name' => 'Staff User',
                'password' => Hash::make('password'),
            ]
        );
        $staff->assignRole('staff');

        $branches = Branch::all();

        foreach ($branches as $branch) {
            // Branch Manager
            $BranchManager = User::firstOrCreate(
                ['email' => 'manager'.$branch->name.'@memeinventory.com'],
                [
                    'name' => $branch->name.' Manager',
                    'password' => Hash::make('password'),
                ]
            );
            $BranchManager->givePermissionTo($branch->name);
            $BranchManager->assignRole('manager');

            // sales User
            $sales = User::firstOrCreate(
                ['email' => 'sales'.$branch->name.'@memeinventory.com'],
                [
                    'name' => $branch->name.' Sales User',
                    'password' => Hash::make('password'),
                ]
            );
            $BranchManager->givePermissionTo($branch->name);
            $sales->assignRole('sales');

        }

    }
}
