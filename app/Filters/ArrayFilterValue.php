<?php

namespace App\Filters;

class ArrayFilterValue extends FilterValue
{
    public function handle(): mixed
    {
        return explode(',', $this->value);
    }
}
