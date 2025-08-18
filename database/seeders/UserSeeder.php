<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    
            // Branch Manager Bangi
            $bangiManager = User::firstOrCreate(
                ['email' => 'managerbangi@memeinventory.com'],
                [
                    'name' => 'Bangi Manager',
                    'password' => Hash::make('password'),
                ]
            );
            $bangiManager->assignRole('branch manager bangi');
    
            // Branch Manager Shah Alam
            $shahAlamManager = User::firstOrCreate(
                ['email' => 'managershahalam@memeinventory.com'],
                [
                    'name' => 'Shah Alam Manager',
                    'password' => Hash::make('password'),
                ]
            );
            $shahAlamManager->assignRole('branch manager shah alam');
    
            // Branch Manager Cheras
            $cherasManager = User::firstOrCreate(
                ['email' => 'managercheras@memeinventory.com'],
                [
                    'name' => 'Cheras Manager',
                    'password' => Hash::make('password'),
                ]
            );
            $cherasManager->assignRole('branch manager cheras');
    
            // Branch Manager Penang
            $penangManager = User::firstOrCreate(
                ['email' => 'managerpenang@memeinventory.com'],
                [
                    'name' => 'Penang Manager',
                    'password' => Hash::make('password'),
                ]
            );
            $penangManager->assignRole('branch manager penang');
        }
}
