<?php

namespace App\Http\Controllers\Api\Product;

use App\Actions\FilterVariantAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductsRequest;
use App\ViewModels\Product\GetProductsViewModel;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request): GetProductsViewModel
    {
        $products = FilterVariantAction::execute(
            $request->filters(),
            $request->sorter()
        );

        return new GetProductsViewModel($products);
    }
}
