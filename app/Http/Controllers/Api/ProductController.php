<?php

namespace App\Http\Controllers\Api;

use App\Actions\FilterVariantAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductsRequest;
use App\ValueObjects\VariantPrice;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request)
    {
        $filters = $request->filters();

        return FilterVariantAction::execute($filters)->map(function ($variant) {
            return [
                'name' => $variant->product->name,
                'brand' => $variant->product->brand,
                'price' => (new VariantPrice($variant->price))->formatted,
                'raiting' => $variant->raiting,
                'color' => $variant->color,
                'size' => $variant->size
            ];
        });
    }
}
