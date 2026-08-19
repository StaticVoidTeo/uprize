<?php

namespace App\Models\Concerns;

use App\Support\MediaDisk;
use Illuminate\Support\Facades\Storage;

trait HasCoverImage
{
    public function coverUrl(): ?string
    {
        $path = $this->cover_image;

        if (! $path) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'images/')) {
            return asset($path);
        }

        return Storage::disk(MediaDisk::covers())->url(ltrim($path, '/'));
    }
}
