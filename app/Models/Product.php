<?php

namespace App\Models;

use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable =
    [
      'name',
      'description',
      'sku',
      'category_id',
      'metal_id',
      'grade_id',
      'weight', 
      'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function metal(): BelongsTo
    {
        return $this->belongsTo(ProductMetal::class);
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(ProductGrade::class);
    }


    public function image(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productInOut(): HasMany
    {
        return $this->hasMany(ProductInOut::class);
    }

    public function productStock(): HasMany
    {
        return $this->hasMany(ProductStock::class);
    }

    public function productSale(): HasMany
    {
        return $this->hasMany(productSale::class);
    }


}
