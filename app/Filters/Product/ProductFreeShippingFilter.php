<?php

namespace App\Filters\Product;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ProductFreeShippingFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->whereHas('product', fn (Builder $query) => $query->where('free_shipping', $this->value));
    }
}
