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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status query()
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
