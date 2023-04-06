<?php

namespace App\Http\Controllers\Web\Product;

use App\Actions\FilterVariantAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductsRequest;
use App\ViewModels\Product\GetProductsViewModel;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request)
    {
        $products = FilterVariantAction::execute(
            $request->filters(),
            $request->sorter()
        );

        return Inertia::render(
            'Product/Index',
            new GetProductsViewModel($products)
        );
    }
}
