<?php

namespace App\Filament\Support;

use Closure;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class AutoSlug
{
    /**
     * @return Closure(Get, Set, ?string, ?string): void
     */
    public static function fromTitle(): Closure
    {
        return function (Get $get, Set $set, ?string $old, ?string $state): void {
            if (($get('slug') ?? '') !== Str::slug((string) $old)) {
                return;
            }

            $set('slug', Str::slug((string) $state));
        };
    }
}
