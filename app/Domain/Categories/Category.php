<?php

namespace App\Domain\Categories;


use App\Domain\Products\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;


/**
 * Class Category
 *
 * @property  Collection products
 * @package App\Domain\Categories
 */
class Category extends \Baum\Node
{
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }
}