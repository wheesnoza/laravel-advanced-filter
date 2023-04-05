<?php

namespace App\ViewModels\Product;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Variant;

class ProductIndexPageViewModel
{
    /**
     * @param Collection|Variant[] $products
     */
    public static function render($products)
    {
        return [
            'products' => $products->map(function ($variant) {
                return [
                    'id' => $variant->id,
                    'name' => $variant->product->name,
                    'brand' => $variant->product->brand,
                    'price' => $variant->price,
                    'raiting' => $variant->raiting,
                    'color' => $variant->color,
                    'size' => $variant->size
                ];
            })
        ];
    }
}
