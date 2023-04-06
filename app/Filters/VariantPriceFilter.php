<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class VariantPriceFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->where('price', '<=', $this->value);
    }
}
