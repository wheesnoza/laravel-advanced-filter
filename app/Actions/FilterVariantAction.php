<?php

namespace App\Actions;

use App\Enums\VariantFilters;
use App\Models\Variant;
use App\Sorters\Sorter;
use Illuminate\Support\Collection;
use App\Collections\Product\ProductCollection;

class FilterVariantAction
{
    /**
     * @return ProductCollection|Variant[]
     */
    public static function execute(Collection $filters, ?Sorter $sorter = null)
    {
        $query = Variant::with('product');

        foreach ($filters as $name => $value) {
            if ($filter = VariantFilters::tryFrom($name)) {
                $filter = $filter->createFilter($value);

                $filter->handle($query);
            }
        }

        $sorter?->handle($query);

        return $query->get();
    }
}
