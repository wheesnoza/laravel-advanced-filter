<?php

namespace App\Http\Controllers\Api;

use App\Actions\FilterVariantAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->collect('filter');

        return FilterVariantAction::execute($filters);
    }
}