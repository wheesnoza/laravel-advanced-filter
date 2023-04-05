<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use App\ValueObjects\VariantPrice as VariantPriceValueObject;

class VariantPrice implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): VariantPriceValueObject
    {
        return new VariantPriceValueObject($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
