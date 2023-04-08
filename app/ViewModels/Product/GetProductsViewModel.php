<?php

namespace App\ViewModels\Product;

use App\Collections\FilterCollection;
use App\Models\Variant;
use App\ViewModels\ViewModel;
use App\ViewModels\WithPagination;
use Illuminate\Support\Collection;

class GetProductsViewModel extends ViewModel
{
    use WithPagination;

    /**
     * @var Collection|Variant[]
     */
    private $products;

    /**
     * @var array<string>
     */
    protected array $reserved = ['excludePaginationLinks'];

    public function __construct(FilterCollection $filters)
    {
        $query = Variant::with('product');

        $filters->perform($query);

        $this->paginator = $query->paginate(self::PER_PAGE);
        $this->products = $this->paginator->collect();
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

    public function excludePaginationLinks(): GetProductsViewModel
    {
        $this->reserved[] = 'links';

        return $this;
    }
}
