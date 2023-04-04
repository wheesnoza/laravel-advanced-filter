<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class VariantPriceLowerThanEqualFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->where('price', '<=', $this->value);
    }
}
