<?php

namespace App\Enums;

use App\Filter\Filter;
use App\Filter\ProductPriceFilter;
use App\Filter\ProductProviderFilter;

enum ProductFilters: string
{
    case Price = 'price';
    case Provider = 'provider';

    public function createFilter(mixed $value): Filter
    {
        return match ($this) {
            self::Price => new ProductPriceFilter($value),
            self::Provider => new ProductProviderFilter($value),
        };
    }
}
