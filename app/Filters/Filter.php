<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    public readonly mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value instanceof FilterValue ? $value->handle() : $value;
    }

    abstract public function handle(Builder $query): void;
}
