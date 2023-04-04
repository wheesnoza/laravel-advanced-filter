<?php

namespace App\Http\Controllers\Api;

use App\Actions\FilterVariantAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductsRequest;

class ProductController extends Controller
{
    public function index(GetProductsRequest $request)
    {
        $filters = $request->filters();

        return FilterVariantAction::execute($filters);
    }
}
