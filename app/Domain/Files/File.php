<?php

namespace App\Domain\Files;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class File extends Model
{
    protected $fillable
        = [
            'disk_name',
            'file_name',
            'file_size',
            'content_type',
            'title',
            'attachment_id',
            'attachment_type',
            'is_public',
            'sort_order'
        ];

    protected $hidden = [
      'disk_name',
      'content_type',
      'attachment_id',
      'attachment_type',
    ];

    public function entity()
    {
        return $this->morphTo();
    }

    public function absolutePath()
    {
        if ($this->file_name) {
            return asset($this->file_name);
        }

        return $this->file_remote_url;
    }
}