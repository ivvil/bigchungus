<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event query()
 * @mixin \Eloquent
 */
class Event extends Model
{
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
        return $this->belongsTo(Valve::class);
    }

    protected $connection = 'app';
}
