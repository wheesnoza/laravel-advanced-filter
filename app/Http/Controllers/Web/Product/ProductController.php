<?php

namespace App\Http\Controllers\Web\Product;

use App\Actions\Product\FilterProductAction;
use App\Actions\Product\GetTopFivePopularProducts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\GetProductsRequest;
use App\ViewModels\Product\GetProductsViewModel;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request): Response
    {
        $products = FilterProductAction::execute(
            $request->filters(),
            $request->sorter()
        );

        $popularProducts = GetTopFivePopularProducts::execute();

        return Inertia::render(
            'Product/Index',
            new GetProductsViewModel($products, $popularProducts)
        );
    }
}
