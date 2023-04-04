<?php

namespace App\Enums;

use App\Filter\VariantPriceFilter;
use App\Filter\VariantProductNameFilter;
use App\Filter\VariantRaitingFilter;
use App\Filter\VariantSizeFilter;

enum VariantFilters: string
{
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
        };
    }
}