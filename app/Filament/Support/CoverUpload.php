<?php

namespace App\Filament\Support;

use App\Support\MediaDisk;
use Filament\Forms\Components\FileUpload;

class CoverUpload
{
    public static function make(string $directory): FileUpload
    {
        return FileUpload::make('cover_image')
            ->image()
            ->disk(MediaDisk::covers())
            ->directory('uprize/'.trim($directory, '/'))
            ->visibility('public')
            ->imageEditor()
            ->maxSize(8192)
            ->columnSpanFull();
    }
}
