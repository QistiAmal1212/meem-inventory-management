<?php

namespace App\Models\References;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMetal extends Model
{
    protected $fillable =
    [
     "name"
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
