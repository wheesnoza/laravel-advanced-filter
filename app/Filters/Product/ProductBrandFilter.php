<?php

namespace App\Filters\Product;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ProductBrandFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->whereHas('product', function (Builder $query) {
            $query->where('brand', $this->value);
        });
    }
}
