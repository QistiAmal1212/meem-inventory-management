<?php

namespace App\Models;

use App\Models\References\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductInOut extends Model
{
    protected $fillable =
    [
     "product_id",
     "branch_id",
     "in_out",
     "user_id",
     "event"
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

}
