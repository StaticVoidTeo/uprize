<?php

namespace App\Support;

class MediaDisk
{
    public static function covers(): string
    {
        return filled(config('filesystems.disks.imagekit.private_key'))
            ? 'imagekit'
            : 'public';
    }
}
