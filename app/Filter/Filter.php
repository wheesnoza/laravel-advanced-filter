<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    public function __construct(protected readonly mixed $value)
    {
    }

    public abstract function handle(Builder $query);
}