<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class VariantPriceLowerThanEqualFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->where('price', '<=', $this->value);
    }
}
