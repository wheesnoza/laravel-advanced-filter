<?php

namespace App\Filters;

class BooleanFilterValue extends FilterValue
{
    public function cast(): mixed
    {
        return filter_var($this->value, FILTER_VALIDATE_BOOLEAN);
    }
}
