<?php

namespace App\Http\Controllers\Web\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\GetProductsRequest;
use App\ViewModels\Product\GetProductsViewModel;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request): Response
    {
        return Inertia::render(
            'Product/Index',
            new GetProductsViewModel($request->filters(), $request->sorter())
        );
    }
}
