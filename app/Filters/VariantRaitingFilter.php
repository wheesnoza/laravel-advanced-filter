<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class VariantRaitingFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->where('raiting', '>=', $this->value);
    }
}
