<?php

namespace App\Actions;

use App\Enums\VariantFilters;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class FilterVariantAction
{
    /**
     * @return EloquentCollection|Variant[]
     */
    public static function execute(Collection $filters)
    {
        $query = Variant::with('product');

        foreach ($filters as $name => $value) {
            if ($filter = VariantFilters::tryFrom($name)) {
                $filter = $filter->createFilter($value);

                $filter->handle($query);
            }
        }

        return $query->get();
    }
}
