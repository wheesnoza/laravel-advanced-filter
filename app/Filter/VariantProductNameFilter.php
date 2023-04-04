<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

class VariantProductNameFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->whereHas('product', function (Builder $query) {
            $query->where('name', 'LIKE', "%$this->value%");
        });
    }
}