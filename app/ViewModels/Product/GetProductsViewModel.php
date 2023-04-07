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
     * @var ProductCollection|Variant[] $    private $popularProducts;

     */
    private $popularProducts;

    /**
     * @param ProductCollection|Variant[] $products
     * @param ProductCollection|Variant[] $popularProducts
     */
    public function __construct($products, $popularProducts)
    {
        $this->products = $products;
        $this->popularProducts = $popularProducts;
    }

    public function popularProducts(): Collection
    {
        return $this->popularProducts
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
                'size' => $variant->size,
                'free_shipping' => $variant->product->free_shipping,
            ];
        };
    }
}
