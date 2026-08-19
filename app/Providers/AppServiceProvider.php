<?php

namespace App\Providers;

use App\Filesystem\ImageKitAdapter;
use App\Services\ImageKitClient;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Storage::extend('imagekit', function ($app, array $config): FilesystemAdapter {
            $client = new ImageKitClient(
                (string) ($config['private_key'] ?? ''),
                (string) ($config['url'] ?? ''),
            );
            $adapter = new ImageKitAdapter($client);

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config,
            );
        });
    }
}
