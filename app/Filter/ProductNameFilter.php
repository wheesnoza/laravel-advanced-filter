<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

class ProductNameFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->where('name', 'LIKE', "%$this->value%");
    }
}