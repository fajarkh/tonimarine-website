<?php

namespace Modules\Rfq\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Rfq\Models\Rfq;
use Tests\Builders\UserBuilder;
use Tests\TestCase;

class RfqBackendTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = UserBuilder::make()->asAdmin()->create();
        $this->actingAs($this->admin);
    }

    public function test_admin_can_view_rfq_index(): void
    {
        $response = $this->get('/admin/rfqs');

        $response->assertStatus(200);
        $response->assertSee('Rfqs');
    }

    public function test_admin_can_create_rfq(): void
    {
        $data = [
            'name' => 'Test Rfq',
            'description' => 'Test description',
            'status' => 1,
        ];

        $response = $this->post('/admin/rfqs', $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('rfqs', ['name' => 'Test Rfq']);
    }

    public function test_admin_can_view_rfq(): void
    {
        $rfq = Rfq::factory()->create();

        $response = $this->get("/admin/rfqs/{$rfq->id}");

        $response->assertStatus(200);
        $response->assertSee($rfq->name);
    }

    public function test_admin_can_edit_rfq(): void
    {
        $rfq = Rfq::factory()->create();

        $response = $this->get("/admin/rfqs/{$rfq->id}/edit");

        $response->assertStatus(200);
        $response->assertSee($rfq->name);
    }

    public function test_admin_can_update_rfq(): void
    {
        $rfq = Rfq::factory()->create();

        $data = [
            'name' => 'Updated Rfq',
            'description' => 'Updated description',
            'status' => 1,
        ];

        $response = $this->put("/admin/rfqs/{$rfq->id}", $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('rfqs', ['name' => 'Updated Rfq']);
    }

    public function test_admin_can_delete_rfq(): void
    {
        $rfq = Rfq::factory()->create();

        $response = $this->delete("/admin/rfqs/{$rfq->id}");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertSoftDeleted('rfqs', ['id' => $rfq->id]);
    }

    public function test_admin_can_restore_rfq(): void
    {
        $rfq = Rfq::factory()->create();
        $rfq->delete();

        $response = $this->patch("/admin/rfqs/{$rfq->id}/restore");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('rfqs', [
            'id' => $rfq->id,
            'deleted_at' => null,
        ]);
    }
}
