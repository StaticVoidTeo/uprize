<?php

namespace Tests\Unit;

use App\Models\Project;
use Tests\TestCase;

class CoverImageTest extends TestCase
{
    public function test_seeded_public_images_use_local_assets(): void
    {
        $project = new Project(['cover_image' => 'images/shopping2.png']);

        $this->assertStringContainsString('images/shopping2.png', $project->coverUrl());
    }

    public function test_imagekit_paths_use_the_configured_endpoint(): void
    {
        config([
            'filesystems.disks.imagekit.private_key' => 'private_test',
            'filesystems.disks.imagekit.url' => 'https://ik.imagekit.io/48n6qrjvy',
        ]);

        $project = new Project(['cover_image' => 'uprize/projects/shot.jpg']);

        $this->assertSame(
            'https://ik.imagekit.io/48n6qrjvy/uprize/projects/shot.jpg',
            $project->coverUrl(),
        );
    }
}
