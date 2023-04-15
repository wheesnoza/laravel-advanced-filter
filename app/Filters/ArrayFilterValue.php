<?php

namespace App\Filters;

use Stringable;
use Illuminate\Support\Arr;

class ArrayFilterValue extends FilterValue implements Stringable
{
    public function handle(): mixed
    {
        return explode(',', $this->value);
    }

    public function __toString()
    {
        return Arr::join($this->value, ',');
    }
}
