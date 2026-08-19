<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Filament\Support\AutoSlug;
use App\Filament\Support\CoverUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
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
                MarkdownEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('client')
                    ->maxLength(255),
                TextInput::make('year')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(2100),
                TextInput::make('category')
                    ->datalist([
                        'Business Website',
                        'E-Commerce',
                        'Portfolio',
                        'Blog',
                        'Informational',
                        'News',
                        'Landing page',
                    ]),
                CoverUpload::make('projects'),
                TextInput::make('url')
                    ->url()
                    ->maxLength(255),
                DateTimePicker::make('published_at')
                    ->native(false)
                    ->seconds(false)
                    ->helperText('Leave empty for a draft. Set to now (or earlier) to publish on the site.'),
            ]);
    }
}
