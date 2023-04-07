<?php

namespace App\Actions\Product;

use App\Collections\Product\ProductCollection;
use App\Models\Variant;

class GetTopFivePopularProducts
{
    public static function execute(): ProductCollection
    {
        return Variant::with('product')
            ->orderByDesc('raiting')
            ->limit(5)
            ->get();
    }
}
