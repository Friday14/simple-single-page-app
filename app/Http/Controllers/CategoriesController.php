<?php

namespace App\Http\Controllers;

use App\Domain\Categories\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return Category::all()->toHierarchy();
    }
}
