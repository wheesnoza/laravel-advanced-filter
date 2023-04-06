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

    /**
     * @param array<int, Variant> $models
     *
     * @return ProductCollection<Variant>
     */
    public function newCollection(array $models = []): ProductCollection
    {
        return new ProductCollection($models);
    }
}
