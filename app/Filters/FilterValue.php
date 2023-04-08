<?php

namespace App\Filters;

abstract class FilterValue
{
    public function __construct(protected readonly mixed $value)
    {
    }

    abstract public function handle(): mixed;
}
