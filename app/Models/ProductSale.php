<?php

namespace App\Models;

use App\Models\References\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'branch_id',
        'user_id',
        'sale_timestamp',
        'remark',
    ];

    /**
     * Get the product associated with the sale.
     */
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }

    /**
     * Get the user (cashier) who made the sale.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

}
