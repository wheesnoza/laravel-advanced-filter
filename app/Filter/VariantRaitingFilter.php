<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

class VariantRaitingFilter extends Filter
{
    public function handle(Builder $query)
    {
        $query->where('raiting', '>=', $this->value);
    }
}
