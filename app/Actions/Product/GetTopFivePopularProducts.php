<?php

namespace App\Actions\Product;

use App\Models\Variant;

class GetTopFivePopularProducts
{
    public static function execute()
    {
        return Variant::with('product')
            ->orderByDesc('raiting')
            ->limit(5)
            ->get();
    }
}
