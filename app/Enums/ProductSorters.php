<?php

namespace App\Enums;

use App\Sorters\ProductPriceSorter;
use App\Sorters\ProductRaitingSorter;
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
