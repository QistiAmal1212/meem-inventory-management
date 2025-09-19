<?php

namespace Database\Seeders;

use App\Models\References\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ['id' => 1, 'name' => 'Shah Alam'],
            ['id' => 2, 'name' => 'Bangi'],
            ['id' => 3, 'name' => 'Jitra'],
            ['id' => 4, 'name' => 'Alor Setar'],
            ['id' => 4, 'name' => 'Johor Bahru'],
            ['id' => 5, 'name' => 'Bertam'],
        ];

        foreach ($branches as $branch) {
            Branch::firstOrCreate(
                ['id' => $branch['id']],
                ['name' => $branch['name']]
            );
        }
    }
}
