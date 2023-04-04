<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductProviderFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->where('provider', '=', $this->value);
    }
}
