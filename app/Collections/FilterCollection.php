<?php

namespace App\Collections;

use App\Enums\Product\ProductFilters;
use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
            ->map(fn ($value, $name) => ProductFilters::tryFrom($name)?->createFilter($value))
            ->filter()
            ->all();
    }

    public function perform(Builder $query): void
    {
        $this->each(fn ($filter) => $filter->handle($query));
    }
}
