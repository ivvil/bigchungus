<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use App\Enum\ValveStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property ValveStatus $status
 * @property string $valve_id
 * @property-read \App\Models\Valve|null $valve
 * @method static Builder<static>|Status newModelQuery()
 * @method static Builder<static>|Status newQuery()
 * @method static Builder<static>|Status query()
 * @method static Builder<static>|Status whereCreatedAt($value)
 * @method static Builder<static>|Status whereId($value)
 * @method static Builder<static>|Status whereStatus($value)
 * @method static Builder<static>|Status whereUpdatedAt($value)
 * @method static Builder<static>|Status whereValveId($value)
 * @mixin \Eloquent
 */
class Status extends Model
{
    use MassPrunable;

    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subMonth());
    }

    public $fillable = [
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => ValveStatus::class,
        ];
    }

    public function valve(): BelongsTo
    {
        return $this->belongsTo(Valve::class);
    }

    protected $connection = 'app';
}
