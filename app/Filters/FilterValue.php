<?php

namespace App\Filters;

abstract class FilterValue
{
    public function __construct(public readonly mixed $value)
    {
    }

    abstract public function cast(): mixed;
}
