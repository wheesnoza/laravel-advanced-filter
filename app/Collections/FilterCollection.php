<?php

namespace App\Collections;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use App\Enums\Product\ProductFilters;
use App\Enums\FilterValues;
use Illuminate\Support\Str;

class FilterCollection extends Collection
{
    public function handle(Builder $query): void
    {
        $this->map(function ($value, $filter) {
            $value = FilterValues::tryFrom(Str::after($filter, ':'))?->create($value) ?: $value;
            return ProductFilters::tryFrom($filter)?->create($value);
        })
        ->filter()
        ->each(fn ($filter) => $filter->handle($query));
    }
}
