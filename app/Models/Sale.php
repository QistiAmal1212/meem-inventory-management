<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_name',
        'product_id',
        'quantity',
        'user_id',
        'date',
        'time',
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
}
