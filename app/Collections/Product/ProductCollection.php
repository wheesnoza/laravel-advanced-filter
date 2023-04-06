<?php

namespace App\Collections\Product;

use Illuminate\Database\Eloquent\Collection;

/**
 * @extends Collection<int,\App\Models\Variant>
 */
class ProductCollection extends Collection
{
    public function populars(): Collection
    {
        return $this
            ->sortByDesc('raiting')
            ->take(5)
            ->values();
    }
}
