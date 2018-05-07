<?php

namespace App\Domain\Files\Traits;

use App\Domain\Files\File;

trait Attachment
{
    public function attachments()
    {
        return $this->morphMany(File::class, 'attachment');
    }

    /**
     * @param string $type
     *
     * @return mixed
     */
    public function attachmentsType(string $type)
    {
        return $this->attachments()->where('content_type', '=', $type)->get();
    }

    /**
     * @param $type string Content Type
     *
     * @return mixed
     */
    public function attachmentType(string $type)
    {
        return $this->attachments()->where('content_type', '=', $type)->first();
    }
}