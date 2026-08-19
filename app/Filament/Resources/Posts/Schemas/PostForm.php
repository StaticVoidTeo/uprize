<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Support\AutoSlug;
use App\Filament\Support\CoverUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(AutoSlug::fromTitle()),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Textarea::make('excerpt')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                MarkdownEditor::make('body')
                    ->required()
                    ->columnSpanFull(),
                CoverUpload::make('posts'),
                DateTimePicker::make('published_at')
                    ->native(false)
                    ->seconds(false)
                    ->helperText('Leave empty for a draft. Set to now (or earlier) to publish on the site.'),
            ]);
    }
}
