<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $type
 * @property \Carbon\CarbonImmutable $time
 * @property string $description
 * @property string $triggerer_id
 * @property-read \App\Models\Valve $triggerer
 * @method static \Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static Builder<static>|Event newModelQuery()
 * @method static Builder<static>|Event newQuery()
 * @method static Builder<static>|Event query()
 * @method static Builder<static>|Event whereCreatedAt($value)
 * @method static Builder<static>|Event whereDescription($value)
 * @method static Builder<static>|Event whereId($value)
 * @method static Builder<static>|Event whereTime($value)
 * @method static Builder<static>|Event whereTriggererId($value)
 * @method static Builder<static>|Event whereType($value)
 * @method static Builder<static>|Event whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    use HasFactory;
    use MassPrunable;

    function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subMonth());
    }

    protected $fillable = [
        'type',
        'time',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'time' => 'immutable_datetime'
        ];
    }

    public function triggerer(): BelongsTo
    {
        return $this->belongsTo(Valve::class, 'triggerer_id', 'valve_id');
    }

    protected $connection = 'app';
}
