<?php

namespace App\ValueObjects;

class VariantPrice
{
    public readonly ?float $value;
    public readonly string $formatted;

    public function __construct(float $value)
    {
        $this->value = $value;

        if ($value === null) {
            $this->formatted = '';
        } else {
            $this->formatted = number_format($value) . '￥';
        }
    }
}
