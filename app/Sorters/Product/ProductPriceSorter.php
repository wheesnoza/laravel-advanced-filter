<?php

namespace App\Sorters\Product;

use App\Sorters\Sorter;
use Illuminate\Database\Eloquent\Builder;

class ProductPriceSorter extends Sorter
{
    public function handle(Builder $query): void
    {
        $query->orderBy('price', $this->sortDirection->value);
    }
}
