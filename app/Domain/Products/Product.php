<?php

namespace App\Domain\Products;

use App\Domain\Categories\Category;
use App\Domain\Files\Traits\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use Attachment;

    public const PRODUCT_IMAGE = 'product_image';
    protected $fillable = ['name', 'description'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
