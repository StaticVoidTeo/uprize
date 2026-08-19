<?php

namespace App\Models;

use App\Models\Concerns\HasCoverImage;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable([
    'title',
    'slug',
    'excerpt',
    'description',
    'client',
    'year',
    'category',
    'cover_image',
    'url',
    'published_at',
])]
class Project extends Model
{
    use HasCoverImage;

    public function isPublished(): bool
    {
        return $this->published_at !== null && $this->published_at->lte(now());
    }

    public function htmlDescription(): string
    {
        return Str::markdown($this->description);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'published_at' => 'datetime',
        ];
    }
}
