<?php

use Illuminate\Database\Seeder;
use App\Domain\Categories\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 5)->create()->each(function (Category $root) {
            factory(Category::class, 3)->create()->each(function (Category $child) use ($root) {
                $child->makeChildOf($root);
            });
        });
    }
}
