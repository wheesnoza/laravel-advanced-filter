<?php

namespace App\Models;

use App\Casts\VariantPrice;
use App\Collections\Product\ProductCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variant extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => VariantPrice::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function newCollection(array $models = [])
    {
        return new ProductCollection($models);
    }
}
