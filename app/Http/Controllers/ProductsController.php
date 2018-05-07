<?php

namespace App\Http\Controllers;

use App\Domain\Categories\Category;
use App\Domain\Products\Product;

class ProductsController extends Controller
{
    public function show(Category $category)
    {
        return $category->products()
                        ->with('attachments')
                        ->whereHas('attachments', function ($query) {
                            $query->where('content_type', '=', Product::PRODUCT_IMAGE);
                        })->get();
    }
}
