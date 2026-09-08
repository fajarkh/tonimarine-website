<?php

namespace Modules\Rfq\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Rfq\Models\Rfq;
use Tests\TestCase;

class RfqModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_rfq_has_correct_table_name(): void
    {
        $rfq = new Rfq;

        $this->assertEquals('rfqs', $rfq->getTable());
    }

    public function test_rfq_has_correct_casts(): void
    {
        $rfq = new Rfq;
        $casts = $rfq->getCasts();

        $this->assertArrayHasKey('created_at', $casts);
        $this->assertArrayHasKey('updated_at', $casts);
        $this->assertArrayHasKey('deleted_at', $casts);
    }

    public function test_rfq_uses_soft_deletes(): void
    {
        $rfq = Rfq::factory()->create();
        $rfq->delete();

        $this->assertSoftDeleted('rfqs', ['id' => $rfq->id]);
    }

    public function test_rfq_factory_creates_valid_data(): void
    {
        $rfq = Rfq::factory()->create();

        $this->assertNotEmpty($rfq->name);
        $this->assertDatabaseHas('rfqs', [
            'id' => $rfq->id,
            'name' => $rfq->name,
        ]);
    }
}
