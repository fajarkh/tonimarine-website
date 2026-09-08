<?php

namespace Modules\Post\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Nasirkhan\ModuleManager\Modules\Post\Models\Post as VendorPost;

class Post extends VendorPost
{
    protected $table = 'posts';

    public function getImageAttribute(?string $value): ?string
    {
        if ($value === null || $value === '') {
            return $value;
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return Storage::disk('public')->url($value);
    }

    public function setImageAttribute($value): void
    {
        if ($value instanceof UploadedFile) {
            $this->attributes['image'] = $value->store('posts', 'public');

            return;
        }

        if ($value !== null) {
            $this->attributes['image'] = $value;
        }
    }
}
