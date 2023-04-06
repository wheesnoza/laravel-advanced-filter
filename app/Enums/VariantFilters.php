<?php

namespace App\Enums;

use App\Filters\Filter;
use App\Filters\VariantPriceFilter;
use App\Filters\VariantPriceGreaterThanEqualFilter;
use App\Filters\VariantPriceLowerThanEqualFilter;
use App\Filters\VariantProductBrandFilter;
use App\Filters\VariantProductNameFilter;
use App\Filters\VariantProductSizeInFilter;
use App\Filters\VariantRaitingFilter;

enum VariantFilters: string
{
    case Price = 'price';
    case Name = 'name';
    case Raiting = 'raiting';
    case Brand = 'brand';
    case PriceGreaterThanEqual = 'price:gte';
    case PriceLowerThanEqual = 'price:lte';
    case SizeIn = 'size:in';

    public function createFilter(mixed $value): Filter
    {
        return match ($this) {
            self::Price => new VariantPriceFilter($value),
            self::Name => new VariantProductNameFilter($value),
            self::Raiting => new VariantRaitingFilter($value),
            self::Brand => new VariantProductBrandFilter($value),
            self::PriceGreaterThanEqual => new VariantPriceGreaterThanEqualFilter($value),
            self::PriceLowerThanEqual => new VariantPriceLowerThanEqualFilter($value),
            self::SizeIn => new VariantProductSizeInFilter($value),
        };
    }
}
