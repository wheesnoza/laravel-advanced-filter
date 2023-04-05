<?php

namespace App\Http\Controllers\Web\Product;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use App\ViewModels\Product\ProductIndexPageViewModel;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Variant::with('product')->get();

        return Inertia::render('Product/Index', ProductIndexPageViewModel::render($products));
    }
}
