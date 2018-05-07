<?php

namespace App\Domain\Products\Jobs;

use App\Domain\Categories\Category;
use App\Domain\Products\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;
    private $description;
    private $categoryId;
    private $image;


    /**
     * CreateProduct constructor.
     *
     * @param int               $categoryId
     * @param string            $name
     * @param string            $description
     * @param UploadedFile|null $productImage
     */
    public function __construct(
        int $categoryId,
        string $name,
        string $description,
        ?UploadedFile $productImage = null
    ) {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->description = $description;
        if ($productImage !== null) {
            $this->image = $this->uploadImage($productImage, Product::PRODUCT_IMAGE);
        }

    }

    /**
     * Execute the job.
     *
     * @return product
     */
    public function handle(): Product
    {
        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->categoryId,
        ]);

        if ($this->image !== null) {
            $product->attachments()->create($this->image);
        }

        return $product;
    }

    /**
     * @param UploadedFile $image
     * @param string       $type
     *
     * @return array
     */
    protected function uploadImage(UploadedFile $image, string $type = 'image'): array
    {
        $path = $image->store('attachments', env('FILESYSTEM_CLOUD'));

        return [
            'disk_name' => env('FILESYSTEM_CLOUD'),
            'file_name' => $path,
            'file_size' => $image->getSize(),
            'content_type' => $type
        ];
    }

}
