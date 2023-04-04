<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductPriceFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->whereHas('variants', function (Builder $query) {
            $query->where('price', '<=', $this->value);
        });
    }
}
