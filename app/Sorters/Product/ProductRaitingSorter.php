<?php

namespace App\Sorters\Product;

use App\Sorters\Sorter;
use Illuminate\Database\Eloquent\Builder;

class ProductRaitingSorter extends Sorter
{
    public function handle(Builder $query): void
    {
        $query->orderBy('raiting', $this->sortDirection->value);
    }
}
