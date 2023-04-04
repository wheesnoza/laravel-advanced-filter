<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

class VariantSizeFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->where('size', '=', $this->value);
    }
}
