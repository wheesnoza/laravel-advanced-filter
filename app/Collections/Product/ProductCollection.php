<?php

namespace App\Collections\Product;

use Illuminate\Database\Eloquent\Collection;

class ProductCollection extends Collection
{
    public function populars()
    {
        return $this
            ->sortBy('raiting')
            ->take(5)
            ->values();
    }
}
