<?php

namespace Modules\Gallery\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Modules\Gallery\Models\Gallery;

class GalleryModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_gallery_has_correct_table_name(): void
    {
        $gallery = new Gallery();

        $this->assertEquals('galleries', $gallery->getTable());
    }

    public function test_gallery_has_correct_casts(): void
    {
        $gallery = new Gallery();
        $casts = $gallery->getCasts();

        $this->assertArrayHasKey('created_at', $casts);
        $this->assertArrayHasKey('updated_at', $casts);
        $this->assertArrayHasKey('deleted_at', $casts);
    }

    public function test_gallery_uses_soft_deletes(): void
    {
        $gallery = Gallery::factory()->create();
        $gallery->delete();

        $this->assertSoftDeleted('galleries', ['id' => $gallery->id]);
    }

    public function test_gallery_factory_creates_valid_data(): void
    {
        $gallery = Gallery::factory()->create();

        $this->assertNotEmpty($gallery->name);
        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'name' => $gallery->name,
        ]);
    }
}
