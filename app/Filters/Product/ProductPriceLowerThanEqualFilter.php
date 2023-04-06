<?php

namespace App\Filters\Product;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Filter;

class ProductPriceLowerThanEqualFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->where('price', '<=', $this->value);
    }
}
