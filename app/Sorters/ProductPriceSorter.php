<?php

namespace App\Sorters;

use Illuminate\Database\Eloquent\Builder;

class ProductPriceSorter extends Sorter
{
    public function handle(Builder $query)
    {
        $query->orderBy('price', $this->sortDirection->value);
    }
}
