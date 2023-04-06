<?php

namespace App\Sorters;

use App\Enums\SortDirections;
use Illuminate\Database\Eloquent\Builder;

abstract class Sorter
{
    public function __construct(protected readonly SortDirections $sortDirection)
    {
    }

    abstract public function handle(Builder $query);
}
