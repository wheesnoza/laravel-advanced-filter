<?php

namespace App\Collections;

use App\Enums\FilterValues;
use App\Enums\Product\ProductFilters;
use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class FilterCollection extends Collection
{
    /**
     * @var Filter[]
     */
    protected $items;

    /**
     * @param array<string, mixed> $items
     */
    public function __construct($items = [])
    {
        $this->items = collect($items)
            ->map(function ($value, $name) {
                $type = Str::after($name, ':');
                $value = FilterValues::tryFrom($type)?->create($value) ?: $value;
                return ProductFilters::tryFrom($name)?->create($value);
            })
            ->filter()
            ->all();
    }

    public function handle(Builder $query): void
    {
        $this->each(fn ($filter) => $filter->handle($query));
    }
}
