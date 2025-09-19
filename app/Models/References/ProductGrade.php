<?php

namespace App\Models\References;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductGrade extends Model
{
    protected $fillable =
        [
            'grade',
        ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
