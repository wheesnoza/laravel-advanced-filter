<?php

namespace App\ValueObjects;

class VariantPrice
{
    public readonly ?float $value;
    public readonly string $formatted;

    public function __construct(float $value)
    {
        $this->value = $value;
        $this->formatted = number_format($value) . '￥';
    }
}
