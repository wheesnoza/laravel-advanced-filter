<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

class ProductProviderFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->where('provider', '=', $this->value);
    }
}
