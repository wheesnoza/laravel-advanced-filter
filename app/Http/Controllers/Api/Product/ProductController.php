<?php

namespace App\Http\Controllers\Api\Product;

use App\Actions\FilterVariantAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductsRequest;
use App\ViewModels\Product\GetProductsViewModel;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request)
    {
        $products = FilterVariantAction::execute($request->filters());

        return new GetProductsViewModel($products);
    }
}
