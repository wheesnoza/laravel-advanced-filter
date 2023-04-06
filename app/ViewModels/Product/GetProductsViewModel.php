<?php

namespace App\ViewModels\Product;

use App\Collections\Product\ProductCollection;
use App\Models\Variant;
use App\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class GetProductsViewModel extends ViewModel
{
    /**
     * @var ProductCollection|Variant[] $products
     */
    private $products;

    /**
     * @param ProductCollection|Variant[] $products
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    public function popularProducts(): Collection
    {
        return $this->products
            ->populars()
            ->map($this->formatProduct());
    }

    public function products(): Collection
    {
        return $this->products
            ->map($this->formatProduct());
    }

    private function formatProduct(): callable
    {
        return function ($variant) {
            return [
                'name' => $variant->product->name,
                'brand' => $variant->product->brand,
                'price' => $variant->price,
                'raiting' => $variant->raiting,
                'color' => $variant->color,
                'size' => $variant->size
            ];
        };
    }
}
