<?php

namespace App\Enums\Product;

use App\Filters\Filter;
use App\Filters\Product\ProductPriceGreaterThanEqualFilter;
use App\Filters\Product\ProductPriceLowerThanEqualFilter;
use App\Filters\Product\ProductBrandFilter;
use App\Filters\Product\ProductFreeShippingFilter;
use App\Filters\Product\ProductNameFilter;
use App\Filters\Product\ProductSizeInFilter;
use App\Filters\Product\ProductRaitingFilter;

enum ProductFilters: string
{
    case Name = 'name';
    case Raiting = 'raiting';
    case Brand = 'brand';
    case PriceGreaterThanEqual = 'price:gte';
    case PriceLowerThanEqual = 'price:lte';
    case SizeIn = 'size:in';
    case FreeShipping = 'free_shipping';

    public function createFilter(mixed $value): Filter
    {
        return match ($this) {
            self::Name => new ProductNameFilter($value),
            self::Raiting => new ProductRaitingFilter($value),
            self::Brand => new ProductBrandFilter($value),
            self::PriceGreaterThanEqual => new ProductPriceGreaterThanEqualFilter($value),
            self::PriceLowerThanEqual => new ProductPriceLowerThanEqualFilter($value),
            self::SizeIn => new ProductSizeInFilter($value),
            self::FreeShipping => new ProductFreeShippingFilter($value),
        };
    }
}
