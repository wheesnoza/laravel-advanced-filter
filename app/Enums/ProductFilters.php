<?php

namespace App\Enums;

use App\Filter\Filter;
use App\Filter\ProductNameFilter;
use App\Filter\ProductPriceFilter;

enum ProductFilters: string
{
    case Name = 'name';
    case Price = 'price';

    public function createFilter(mixed $value): Filter
    {
        return match ($this) {
            self::Name => new ProductNameFilter($value),
            self::Price => new ProductPriceFilter($value),
        };
    }
}