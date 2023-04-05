<?php

use App\Http\Controllers\Web\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
