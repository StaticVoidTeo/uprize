<?php

namespace App\Filesystem;

use App\Services\ImageKitClient;
use League\Flysystem\Config;
use League\Flysystem\DirectoryAttributes;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\UnableToCopyFile;
use League\Flysystem\UnableToDeleteDirectory;
use League\Flysystem\UnableToDeleteFile;
use League\Flysystem\UnableToMoveFile;
use League\Flysystem\UnableToReadFile;
use League\Flysystem\UnableToRetrieveMetadata;
use League\Flysystem\UnableToWriteFile;
use League\Flysystem\Visibility;
use RuntimeException;
use Throwable;

class ImageKitAdapter implements FilesystemAdapter
{
    public function __construct(private readonly ImageKitClient $client) {}

    public function getUrl(string $path): string
    {
        return $this->client->url($path);
    }

    public function fileExists(string $path): bool
    {
        try {
            return $this->client->find($path) !== null;
        } catch (Throwable $exception) {
            throw UnableToRetrieveMetadata::create($path, 'fileExists', $exception->getMessage(), $exception);
        }
    }

    public function directoryExists(string $path): bool
    {
        return true;
    }

    public function write(string $path, string $contents, Config $config): void
    {
        try {
            $this->client->upload($path, $contents);
        } catch (Throwable $exception) {
            throw UnableToWriteFile::atLocation($path, $exception->getMessage(), $exception);
        }
    }

    public function writeStream(string $path, $contents, Config $config): void
    {
        $body = stream_get_contents($contents);

        if ($body === false) {
            throw UnableToWriteFile::atLocation($path, 'Unable to read upload stream.');
        }

        $this->write($path, $body, $config);
    }

    public function read(string $path): string
    {
        $contents = @file_get_contents($this->client->url($path));

        if ($contents === false) {
            throw UnableToReadFile::fromLocation($path, 'Unable to download from ImageKit.');
        }

        return $contents;
    }

    public function readStream(string $path)
    {
        $stream = fopen($this->client->url($path), 'r');

        if ($stream === false) {
            throw UnableToReadFile::fromLocation($path, 'Unable to open ImageKit stream.');
        }

        return $stream;
    }

    public function delete(string $path): void
    {
        try {
            $this->client->delete($path);
        } catch (Throwable $exception) {
            throw UnableToDeleteFile::atLocation($path, $exception->getMessage(), $exception);
        }
    }

    public function deleteDirectory(string $path): void
    {
        throw UnableToDeleteDirectory::atLocation($path, 'ImageKit directory deletes are not used.');
    }

    public function createDirectory(string $path, Config $config): void
    {
        // Folders are created automatically on upload.
    }

    public function setVisibility(string $path, string $visibility): void
    {
        // ImageKit files uploaded here are public.
    }

    public function visibility(string $path): FileAttributes
    {
        return new FileAttributes($path, visibility: Visibility::PUBLIC);
    }

    public function mimeType(string $path): FileAttributes
    {
        return new FileAttributes($path, mimeType: $this->guessMimeType($path));
    }

    public function lastModified(string $path): FileAttributes
    {
        $file = $this->metadata($path);
        $timestamp = isset($file['updatedAt']) ? strtotime((string) $file['updatedAt']) : time();

        return new FileAttributes($path, lastModified: $timestamp ?: time());
    }

    public function fileSize(string $path): FileAttributes
    {
        $file = $this->metadata($path);

        return new FileAttributes($path, fileSize: (int) ($file['size'] ?? 0));
    }

    public function listContents(string $path, bool $deep): iterable
    {
        try {
            $files = $this->client->list($path);
        } catch (RuntimeException $exception) {
            throw UnableToRetrieveMetadata::create($path, 'list', $exception->getMessage(), $exception);
        }

        foreach ($files as $file) {
            $filePath = ltrim((string) ($file['filePath'] ?? ''), '/');

            if (($file['type'] ?? 'file') === 'folder') {
                yield new DirectoryAttributes($filePath);

                continue;
            }

            yield new FileAttributes(
                $filePath,
                fileSize: (int) ($file['size'] ?? 0),
                visibility: Visibility::PUBLIC,
                lastModified: isset($file['updatedAt']) ? strtotime((string) $file['updatedAt']) ?: null : null,
                mimeType: $file['mime'] ?? $this->guessMimeType($filePath),
            );
        }
    }

    public function move(string $source, string $destination, Config $config): void
    {
        try {
            $this->copy($source, $destination, $config);
            $this->delete($source);
        } catch (Throwable $exception) {
            throw UnableToMoveFile::fromLocationTo($source, $destination, $exception);
        }
    }

    public function copy(string $source, string $destination, Config $config): void
    {
        try {
            $this->write($destination, $this->read($source), $config);
        } catch (Throwable $exception) {
            throw UnableToCopyFile::fromLocationTo($source, $destination, $exception);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function metadata(string $path): array
    {
        $file = $this->client->find($path);

        if ($file === null) {
            throw UnableToRetrieveMetadata::create($path, 'metadata', 'File not found in ImageKit.');
        }

        return $file;
    }

    private function guessMimeType(string $path): string
    {
        return match (strtolower(pathinfo($path, PATHINFO_EXTENSION))) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'webp' => 'image/webp',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            default => 'application/octet-stream',
        };
    }
}
