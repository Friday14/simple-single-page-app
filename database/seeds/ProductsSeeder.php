<?php

use Illuminate\Database\Seeder;
use App\Domain\Categories\Category;
use App\Domain\Products\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Throwable
     */
    public function run()
    {
        $categories = Category::get();
        throw_if($categories->isEmpty(), new Exception('First, create categories'));

        $categories->each(function (Category $category) {
            $products = factory(Product::class, random_int(1, 3))->make();
            $category->products()->saveMany($products);
            $products->each(function (Product $product) {
                $product->attachments()->save(factory(\App\Domain\Files\File::class)->make());
            });
        });
    }
}
