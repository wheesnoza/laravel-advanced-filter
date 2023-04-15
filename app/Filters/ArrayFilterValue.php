<?php

namespace App\Filters;

class ArrayFilterValue extends FilterValue
{
    public function cast(): mixed
    {
        return explode(',', $this->value);
    }
}
