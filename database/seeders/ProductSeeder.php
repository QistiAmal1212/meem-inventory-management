<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\References\Branch;
use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $productCategory = [
            ['id' => 1, 'name' => 'Special Edition Gold'],
            ['id' => 2, 'name' => 'Landing Page'],
            ['id' => 3, 'name' => 'Gold Wafer'],
            ['id' => 4, 'name' => 'Gold Dinar'],
            ['id' => 5, 'name' => 'Silver Dirham'],
            ['id' => 6, 'name' => 'Limited Edition Gold'],
            ['id' => 7, 'name' => 'Merchandise'],
            ['id' => 8, 'name' => 'Promotion'],
        ];

        foreach ($productCategory as $category) {
            ProductCategory::firstOrCreate(
                ['id' => $category['id']],
                ['name' => $category['name']]
            );
        }

        $productMetals = [
            ['id' => 1, 'name' => 'Gold'],
            ['id' => 2, 'name' => 'Silver'],
        ];

        foreach ($productMetals as $metal) {
            ProductMetal::firstOrCreate(
                ['id' => $metal['id']],
                ['name' => $metal['name']]
            );
        }

        $productGrades = [
            ['id' => 1, 'grade' => '999.9'],
            ['id' => 2, 'grade' => '999'],
            ['id' => 3, 'grade' => '916'],
        ];

        foreach ($productGrades as $grade) {
            ProductGrade::firstOrCreate(
                ['id' => $grade['id']],
                ['grade' => $grade['grade']]
            );
        }

        $products = [
            [
                'id' => 1,
                'name' => '0.5gram Raya Edition 2',
                'description' => '0.5gram Au 999.9 Special Edition',
                'sku' => '0.5G-RY22022',
                'category_id' => 1,
                'metal_id' => 1,
                'grade_id' => 1,
                'weight' => 0.5,
                'status' => 1,
            ],
            [
                'id' => 2,
                'name' => '10 Gram Wafer',
                'description' => '10 Gram Au 999.9 Wafer',
                'sku' => '10G-FEB2022',
                'category_id' => 3,
                'metal_id' => 1,
                'grade_id' => 1,
                'weight' => 10,
                'status' => 1,
            ],
            [
                'id' => 3,
                'name' => '1 Dinar',
                'description' => '1 Dinar 4.25 gram 999.9',
                'sku' => 'D-FEB2022',
                'category_id' => 4,
                'metal_id' => 1,
                'grade_id' => 1,
                'weight' => 4.25,
                'status' => 1,
            ],
            [
                'id' => 4,
                'name' => '1 Dirham',
                'description' => 'Silver 999 Minted Coin',
                'sku' => '1DIR-FEB2022',
                'category_id' => 5,
                'metal_id' => 2,
                'grade_id' => 2,
                'weight' => 2.975,
                'status' => 1,
            ],
            [
                'id' => 5,
                'name' => '0.5 gram Edisi Tahun 2023',
                'description' => '0.5 gram Au 999.9 Edisi Tahun 2023',
                'sku' => '0.5G-E232023',
                'category_id' => 6,
                'metal_id' => 1,
                'grade_id' => 1,
                'weight' => 1,
                'status' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['id' => $product['id']], // search attributes
                [
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'sku' => $product['sku'],
                    'category_id' => $product['category_id'],
                    'metal_id' => $product['metal_id'],
                    'grade_id' => $product['grade_id'],
                    'weight' => $product['weight'],
                    'status' => $product['status'],
                ]
            );
        }

        $branches = Branch::all();
        $productStockId = 0;
        // $productSaleId = 0;
        // $productInOutId = 0;

        foreach ($branches as $branch) {

            $productStocks = [
                [
                    'id' => $productStockId + 1,
                    'product_id' => 1,
                    'branch_id' => $branch->id,
                    'quantity' => rand(1, 100),
                    'min_quantity' => 5,
                    'vault' => null,
                ],
                [
                    'id' => $productStockId + 1,
                    'product_id' => 2,
                    'branch_id' => $branch->id,
                    'quantity' => rand(1, 100),
                    'min_quantity' => 50,
                    'vault' => null,
                ],
                [
                    'id' => $productStockId + 1,
                    'product_id' => 3,
                    'branch_id' => $branch->id,
                    'quantity' => rand(1, 100),
                    'min_quantity' => 10,
                    'vault' => null,
                ],
                [
                    'id' => $productStockId + 1,
                    'product_id' => 4,
                    'branch_id' => $branch->id,
                    'quantity' => rand(1, 100),
                    'min_quantity' => 10,
                    'vault' => null,
                ],
                [
                    'id' => $productStockId + 1,
                    'product_id' => 5,
                    'branch_id' => $branch->id,
                    'quantity' => rand(1, 100),
                    'min_quantity' => 10,
                    'vault' => null,
                ],
            ];

            // $productSales = [
            //     [
            //     'id' => $productSaleId + 1,
            //     'product_id' => 1,
            //     'user_id' => 1,
            //     'branch_id' => $branch->id,
            //     'quantity' => rand(1, 100),
            //     'remark' => null,
            //     'sale_timestamp' => now(),
            //    ],
            //    [
            //     'id' => $productSaleId + 1,
            //     'product_id' => 2,
            //     'user_id' => 1,
            //     'branch_id' => $branch->id,
            //     'quantity' => rand(1, 100),
            //     'remark' => null,
            //     'sale_timestamp' => now(),
            //   ],
            //   [
            //     'id' => $productSaleId + 1,
            //     'product_id' => 3,
            //     'user_id' => 1,
            //     'branch_id' => $branch->id,
            //     'quantity' => rand(1, 100),
            //     'remark' => null,
            //     'sale_timestamp' => now(),
            //   ],
            //   [
            //     'id' => $productSaleId + 1,
            //     'product_id' => 4,
            //     'user_id' => 1,
            //     'branch_id' => $branch->id,
            //     'quantity' => rand(1, 100),
            //     'remark' => null,
            //     'sale_timestamp' => now(),
            //   ],
            //   [
            //     'id' =>$productSaleId + 1,
            //     'product_id' => 5,
            //     'user_id' => 1,
            //     'branch_id' => $branch->id,
            //     'quantity' => rand(1, 100),
            //     'remark' => null,
            //     'sale_timestamp' => now(),
            //   ],
            // ];

            foreach ($productStocks as $stock) {
                ProductGrade::firstOrCreate(
                    ['id' => $stock['id']],
                    ['product_id' => $stock['product_id']],
                    ['branch_id' => $stock['branch_id']],
                    ['quantity' => $stock['quantity']],
                    ['min_quantity' => $stock['min_quantity']],
                    ['vault' => $stock['vault']],
                );
            }

            // foreach ($productSales as $sale) {
            //     ProductGrade::firstOrCreate(
            //         ['id' => $sale['id']],
            //         ['product_id' => $sale['product_id']],
            //         ['user_id' => $sale['user_id']],
            //         ['branch_id' => $sale['branch_id']],
            //         ['quantity' => $sale['quantity']],
            //         ['remark' => $sale['remark']],
            //         ['sale_timestamp' => $sale['sale_timestamp']],
            //     );
            // }

        }

    }
}
