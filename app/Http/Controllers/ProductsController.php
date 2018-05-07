<?php

namespace App\Http\Controllers;

use App\Domain\Categories\Category;
use App\Domain\Products\Jobs\CreateProduct;
use App\Domain\Products\Product;
use App\Http\Requests\ProductRequest;

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

    public function create(ProductRequest $request)
    {
        $creator = new CreateProduct(
            $request->input('category'),
            $request->input('name'),
            $request->input('description'),
            $request->file('image')
        );
        $this->dispatchNow($creator);

        return [
            'msg' => 'Product Created'
        ];
    }

    public function delete(Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
            return [
                'error' => true,
                'msg' => $e->getMessage()
            ];
        }

        return [
            'msg' => 'Product deleted'
        ];
    }
}
