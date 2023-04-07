<?php

namespace App\ViewModels\Product;

use App\Enums\Product\ProductFilters;
use App\Models\Variant;
use App\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class GetProductsViewModel extends ViewModel
{
    public const PER_PAGE = 15;

    private $products;

    public function __construct(Collection $filters)
    {
        $query = Variant::with('product');

        foreach ($filters as $name => $value) {
            if ($filter = ProductFilters::tryFrom($name)) {
                $filter = $filter->createFilter($value);

                $filter->handle($query);
            }
        }

        $this->products = $query->paginate(self::PER_PAGE);
    }

    public function popularProducts(): Collection
    {
        return Variant::with('product')
            ->orderByDesc('raiting')
            ->limit(5)
            ->get()
            ->map($this->formatProduct());
    }

    public function products(): Collection
    {
        return $this->products
            ->collect()
            ->map($this->formatProduct());
    }

    public function pagination()
    {
        return collect($this->products)->except('data');
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
