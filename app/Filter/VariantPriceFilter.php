<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

class VariantPriceFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->where('price', '<=', $this->value);
    }
}