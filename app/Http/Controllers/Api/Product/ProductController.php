<?php

namespace App\Http\Controllers\Api\Product;

use App\Actions\Product\FilterProductAction;
use App\Actions\Product\GetTopFivePopularProducts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\GetProductsRequest;
use App\ViewModels\Product\GetProductsViewModel;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request): GetProductsViewModel
    {
        $products = FilterProductAction::execute(
            $request->filters(),
            $request->sorter()
        );

        $popularProducts = GetTopFivePopularProducts::execute();

        return new GetProductsViewModel($products, $popularProducts);
    }
}
