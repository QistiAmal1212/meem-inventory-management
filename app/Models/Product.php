<?php

namespace App\Models;

use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
            'created_user_id',
        ];

    protected function weight(): Attribute
    {
        return Attribute::get(fn ($value) => rtrim(rtrim(number_format($value, 3, '.', ''), '0'), '.').' g'
        );
    }

    protected function numericWeight(): Attribute
    {
        return Attribute::get(fn () => rtrim(rtrim(number_format($this->attributes['weight'], 3, '.', ''), '0'), '.')
        );
    }

    public function createdUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productInOut(): HasMany
    {
        return $this->hasMany(ProductInOut::class);
    }

    public function productStock(): HasOne
    {
        $branchId = session('branch_id');
        // dd($branchId);
        return $this->hasOne(ProductStock::class, 'product_id', 'id')
                    ->where('branch_id', $branchId);
    }


    // public function productSale(): HasMany
    // {
    //     return $this->hasMany(productSale::class);
    // }

    protected function statusBadge(): Attribute
    {
        return Attribute::get(function () {
            if ($this->status == 1) {
                return '<span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Active</span>';
            }

            return '<span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">Inactive</span>';
        });
    }

    public function getThumbnailHtmlAttribute()
    {
        if ($this->images->isNotEmpty()) {
            $url = asset('storage/' . $this->images->first()->path);

            return <<<HTML
                <img src="{$url}" 
                    alt="{$this->name}" 
                    class="w-6 h-6 rounded object-cover bg-gray-200"
                    loading="lazy"
                    decoding="async">
                <span class="text-xs">{$this->name}</span>
            HTML;
        }

        return <<<HTML
            <div class="w-6 h-6 rounded bg-zinc-300"></div>
            <span class="text-xs">{$this->name}</span>
        HTML;
    }

}
