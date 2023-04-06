<?php

namespace App\Filters\Product;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Filter;

class ProductNameFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->whereHas('product', function (Builder $query) {
            $query->where('name', 'LIKE', "%$this->value%");
        });
    }
}
