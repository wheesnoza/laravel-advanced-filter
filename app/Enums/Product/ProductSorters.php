<?php

namespace App\Enums\Product;

use App\Enums\SortDirections;
use App\Sorters\Product\ProductPriceSorter;
use App\Sorters\Product\ProductRaitingSorter;
use App\Sorters\Sorter;

enum ProductSorters: string
{
    case Raiting = 'raiting';
    case Price = 'price';

    public function createSorter(SortDirections $sortDirection): Sorter
    {
        return match ($this) {
            self::Raiting => new ProductRaitingSorter($sortDirection),
            self::Price => new ProductPriceSorter($sortDirection),
        };
    }
}
