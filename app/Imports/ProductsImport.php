<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $category = trim(Str::lower($row['category'] ?? ''));
        $metal    = trim(Str::lower($row['metal'] ?? ''));
        $grade    = trim(Str::lower($row['grade'] ?? ''));

        return new Product([
            'name'        => $row['name'] ?? null,
            'description' => $row['description'] ?? null,
            'sku'         => $row['sku'] ?? null,
            'weight'      => $row['weight'] ?? null,

            'category_id' => ProductCategory::whereRaw("LOWER(name) = ?", [$category])->value('id'),
            'metal_id'    => ProductMetal::whereRaw("LOWER(name) = ?", [$metal])->value('id'),
            'grade_id'    => ProductGrade::whereRaw("LOWER(grade) = ?", [$grade])->value('id'),

            'status'          => 1,
            'created_user_id' => 1,
        ]);
    }
}
