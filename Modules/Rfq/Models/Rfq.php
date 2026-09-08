<?php

namespace Modules\Rfq\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Rfq\database\factories\RfqFactory;

class Rfq extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rfqs';

    protected function casts(): array
    {
        return [
            'eta' => 'datetime',
        ];
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return RfqFactory::new();
    }
}
