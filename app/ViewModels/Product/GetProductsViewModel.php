<?php

namespace App\ViewModels\Product;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Variant;
use App\ViewModels\ViewModel;

class GetProductsViewModel extends ViewModel
{
    private $products;

    /**
     * @param Collection|Variant[] $products
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    public function products()
    {
        return $this->products->map(function ($variant) {
            return [
                'name' => $variant->product->name,
                'brand' => $variant->product->brand,
                'price' => $variant->price,
                'raiting' => $variant->raiting,
                'color' => $variant->color,
                'size' => $variant->size
            ];
        });
    }
}