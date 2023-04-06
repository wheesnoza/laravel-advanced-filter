<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class VariantProductBrandFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->whereHas('product', function (Builder $query) {
            $query->where('brand', $this->value);
        });
    }
}
