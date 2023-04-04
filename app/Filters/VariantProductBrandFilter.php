<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class VariantProductBrandFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->whereHas('product', function (Builder $query) {
            $query->where('brand', $this->value);
        });
    }
}
