<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    public readonly mixed $value;

    public function __construct(FilterValue|string|int|float $value)
    {
        $this->value = $value instanceof FilterValue ? $value->cast() : $value;
    }

    abstract public function handle(Builder $query): void;
}
