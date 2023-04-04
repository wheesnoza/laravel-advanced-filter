<?php

namespace App\Enums;

use App\Filters\VariantPriceFilter;
use App\Filters\VariantPriceRangeFilters\VariantPriceGreaterThanEqualFilter;
use App\Filters\VariantPriceRangeFilters\VariantPriceLowerThanEqualFilter;
use App\Filters\VariantProductNameFilter;
use App\Filters\VariantRaitingFilter;
use App\Filters\VariantSizeFilter;

enum VariantFilters: string
{
    case PriceGreaterThanEqual = 'gte:price';
    case PriceLowerThanEqual = 'lte:price';
    case Price = 'price';
    case Size = 'size';
    case Raiting = 'raiting';
    case Name = 'name';

    public function createFilter($value)
    {
        return match ($this) {
            self::Price => new VariantPriceFilter($value),
            self::Size => new VariantSizeFilter($value),
            self::Raiting => new VariantRaitingFilter($value),
            self::Name => new VariantProductNameFilter($value),
            self::PriceGreaterThanEqual => new VariantPriceGreaterThanEqualFilter($value),
            self::PriceLowerThanEqual => new VariantPriceLowerThanEqualFilter($value),
        };
    }
}
