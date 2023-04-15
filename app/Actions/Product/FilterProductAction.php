<?php

namespace App\Actions\Product;

use App\Enums\FilterValues;
use App\Models\Variant;
use App\Sorters\Sorter;
use Illuminate\Support\Collection;
use App\Collections\Product\ProductCollection;
use App\Enums\Product\ProductFilters;
use Illuminate\Support\Str;

class FilterProductAction
{
    /**
     * @return ProductCollection|Variant[]
     */
    public static function execute(Collection $filters, ?Sorter $sorter = null)
    {
        $query = Variant::with('product');

        foreach ($filters as $name => $value) {
            if ($filter = ProductFilters::tryFrom($name)) {
                $valueTypeSuffix = Str::after($name, ':');
                $filterValue = FilterValues::tryFrom($valueTypeSuffix)?->create($value) ?: $value;
                $filter = $filter->create($filterValue);

                $filter->handle($query);
            }
        }

        $sorter?->handle($query);

        return $query->get();
    }
}
