<?php

namespace App\Actions\Product;

use App\Models\Variant;
use App\Sorters\Sorter;
use Illuminate\Support\Collection;
use App\Collections\Product\ProductCollection;
use App\Enums\Product\ProductFilters;

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
                $filter = $filter->create($value);

                $filter->handle($query);
            }
        }

        $sorter?->handle($query);

        return $query->get();
    }
}
