<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\GetProductsRequest;
use App\ViewModels\Product\GetProductsViewModel;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request)
    {
        return new GetProductsViewModel($request->filters());
    }
}
