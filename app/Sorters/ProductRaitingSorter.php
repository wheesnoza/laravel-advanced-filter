<?php

namespace App\Sorters;

use Illuminate\Database\Eloquent\Builder;

class ProductRaitingSorter extends Sorter
{
    public function handle(Builder $query)
    {
        $query->orderBy('raiting', $this->sortDirection->value);
    }
}
