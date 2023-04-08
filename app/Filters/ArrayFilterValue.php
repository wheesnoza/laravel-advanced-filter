<?php

namespace App\Filters;

class ArrayFilterValue extends FilterValue
{
    public function handle()
    {
        return explode(',', $this->value);
    }
}
