<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;

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

    private $fillable = [
        'type',
        'time',
        'description',
        'tiggerer',
    ];

    protected function casts(): array
    {
        return [
            'time' => 'immutable_datetime'
        ];
    }



    protected $connection = 'app';
}
