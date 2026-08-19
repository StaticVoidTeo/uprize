<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class ImageKitClient
{
    public function __construct(
        private readonly string $privateKey,
        private readonly string $endpoint,
    ) {}

    public function url(string $path): string
    {
        return rtrim($this->endpoint, '/').'/'.ltrim($path, '/');
    }

    public function upload(string $path, string $contents): void
    {
        $fileName = basename($path);
        $folder = $this->folderFromPath($path);

        $response = $this->http()
            ->attach('file', $contents, $fileName)
            ->post('https://upload.imagekit.io/api/v1/files/upload', [
                'fileName' => $fileName,
                'folder' => $folder,
                'useUniqueFileName' => 'false',
                'overwriteFile' => 'true',
            ]);

        if ($response->failed()) {
            throw new RuntimeException('ImageKit upload failed: '.$response->body());
        }
    }

    public function delete(string $path): void
    {
        $file = $this->find($path);

        if ($file === null) {
            return;
        }

        $response = $this->http()->delete('https://api.imagekit.io/v1/files/'.$file['fileId']);

        if ($response->failed()) {
            throw new RuntimeException('ImageKit delete failed: '.$response->body());
        }
    }

    /**
     * @return array<string, mixed>|null
     */
    public function find(string $path): ?array
    {
        $response = $this->http()->get('https://api.imagekit.io/v1/files', [
            'path' => $this->folderFromPath($path),
            'searchQuery' => 'name="'.basename($path).'"',
            'limit' => 1,
        ]);

        if ($response->failed()) {
            throw new RuntimeException('ImageKit lookup failed: '.$response->body());
        }

        $files = $response->json();

        if (! is_array($files) || $files === []) {
            return null;
        }

        return $files[0];
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function list(string $folder): array
    {
        $response = $this->http()->get('https://api.imagekit.io/v1/files', [
            'path' => $folder === '' ? '/' : $this->folderFromPath($folder.'/placeholder'),
            'limit' => 1000,
        ]);

        if ($response->failed()) {
            throw new RuntimeException('ImageKit list failed: '.$response->body());
        }

        $files = $response->json();

        return is_array($files) ? $files : [];
    }

    private function folderFromPath(string $path): string
    {
        $directory = str_replace('\\', '/', dirname($path));

        if ($directory === '.' || $directory === '/') {
            return '/';
        }

        return '/'.trim($directory, '/');
    }

    private function http(): PendingRequest
    {
        return Http::withBasicAuth($this->privateKey, '')
            ->timeout(120)
            ->acceptJson();
    }
}
