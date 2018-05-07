<?php

namespace App\Http\Controllers;

use App\Domain\Categories\Category;

class CategoriesController extends Controller
{
    public function index(string $format = null)
    {
        if ($format === 'nested_array') {
            $categories = Category::getNestedList('name', 'id', '—');
            return collect($categories)->map(function ($category, $id) {
                return [
                    'id' => $id,
                    'name' => $category
                ];
            })->values();
        }

        return Category::all()->toHierarchy();
    }
}
