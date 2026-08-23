<?php

namespace Modules\Gallery\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Builders\UserBuilder;
use Tests\TestCase;

class GalleryBackendTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = UserBuilder::make()->asAdmin()->create();
        $this->actingAs($this->admin);
    }

    public function test_admin_can_view_gallery_index(): void
    {
        $response = $this->get('/admin/galleries');

        $response->assertStatus(200);
        $response->assertSee('Galleries');
    }

    public function test_admin_can_create_gallery(): void
    {
        $data = [
            'name' => 'Test Gallery',
            'description' => 'Test description',
            'status' => 1,
        ];

        $response = $this->post('/admin/galleries', $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('galleries', ['name' => 'Test Gallery']);
    }

    public function test_admin_can_view_gallery(): void
    {
        $gallery = \Modules\Gallery\Models\Gallery::factory()->create();

        $response = $this->get("/admin/galleries/{$gallery->id}");

        $response->assertStatus(200);
        $response->assertSee($gallery->name);
    }

    public function test_admin_can_edit_gallery(): void
    {
        $gallery = \Modules\Gallery\Models\Gallery::factory()->create();

        $response = $this->get("/admin/galleries/{$gallery->id}/edit");

        $response->assertStatus(200);
        $response->assertSee($gallery->name);
    }

    public function test_admin_can_update_gallery(): void
    {
        $gallery = \Modules\Gallery\Models\Gallery::factory()->create();

        $data = [
            'name' => 'Updated Gallery',
            'description' => 'Updated description',
            'status' => 1,
        ];

        $response = $this->put("/admin/galleries/{$gallery->id}", $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('galleries', ['name' => 'Updated Gallery']);
    }

    public function test_admin_can_delete_gallery(): void
    {
        $gallery = \Modules\Gallery\Models\Gallery::factory()->create();

        $response = $this->delete("/admin/galleries/{$gallery->id}");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertSoftDeleted('galleries', ['id' => $gallery->id]);
    }

    public function test_admin_can_restore_gallery(): void
    {
        $gallery = \Modules\Gallery\Models\Gallery::factory()->create();
        $gallery->delete();

        $response = $this->patch("/admin/galleries/{$gallery->id}/restore");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'deleted_at' => null,
        ]);
    }
}
