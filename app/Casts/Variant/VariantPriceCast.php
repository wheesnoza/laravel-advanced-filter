<?php

namespace App\Casts\Variant;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use App\ValueObjects\Product\VariantPrice as VariantPriceValueObject;

class VariantPriceCast implements CastsAttributes
{
    /**
     * @param array<string,mixed> $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): VariantPriceValueObject
    {
        return new VariantPriceValueObject($value);
    }

    /**
     * @param array<string,mixed> $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
