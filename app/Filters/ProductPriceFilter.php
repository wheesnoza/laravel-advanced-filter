<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductPriceFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->whereHas('variants', function (Builder $query) {
            $query->where('price', '<=', $this->value);
        });
    }
}
