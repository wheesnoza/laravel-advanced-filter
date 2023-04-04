<?php

namespace App\Enums;

use App\Filters\Filter;
use App\Filters\ProductPriceFilter;
use App\Filters\ProductProviderFilter;

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
