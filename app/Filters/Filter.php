<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    protected readonly mixed $value;

    public function __construct(FilterValue|string|int|float $value)
    {
        $this->value = $value instanceof FilterValue ? $value->handle() : $value;
    }

    abstract public function handle(Builder $query): void;
}
