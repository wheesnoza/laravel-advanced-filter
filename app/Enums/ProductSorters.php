<?php

namespace App\Enums;

use App\Sorters\ProductPriceSorter;
use App\Sorters\ProductRaitingSorter;

enum ProductSorters: string
{
    case Raiting = 'raiting';
    case Price = 'price';

    public function createSorter(SortDirections $sortDirection)
    {
        return match ($this) {
            self::Raiting => new ProductRaitingSorter($sortDirection),
            self::Price => new ProductPriceSorter($sortDirection),
        };
    }
}
