<?php

namespace App\Http\Controllers\Api;

use App\Enums\ProductFilters;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->collect('filters');
        $query = Product::with('variants');

        foreach ($filters as $name => $value) {
            $filter = ProductFilters::from($name)->createFilter($value);

            $filter->handle($query);
        }

        return $query->get();
    }
}