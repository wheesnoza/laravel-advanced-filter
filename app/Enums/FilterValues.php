<?php

namespace App\Enums;

use App\Filters\ArrayFilterValue;
use App\Filters\BooleanFilterValue;
use App\Filters\FilterValue;

enum FilterValues: string
{
    case In = 'in';
    case Has = 'has';
    case Is = 'is';

    public function create(mixed $value): FilterValue
    {
        return match ($this) {
            self::In => new ArrayFilterValue($value),
            self::Has => new BooleanFilterValue($value),
            self::Is => new BooleanFilterValue($value),
        };
    }
}
