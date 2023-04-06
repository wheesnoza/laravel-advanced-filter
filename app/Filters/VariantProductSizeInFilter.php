<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class VariantProductSizeInFilter extends Filter
{
    public function handle(Builder $query): void
    {
        $query->whereIn('size', explode(',', $this->value));
    }
}
