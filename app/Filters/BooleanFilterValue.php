<?php

namespace App\Filters;

class BooleanFilterValue extends FilterValue
{
    public function handle(): mixed
    {
        return filter_var($this->value, FILTER_VALIDATE_BOOLEAN);
    }
}
