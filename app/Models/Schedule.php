<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule query()
 * @mixin \Eloquent
 */
class Schedule extends Model
{
    use SoftDeletes;

    public $fillable = [
        'enabled',
        'start',
        'end',
    ];

    public function casts(): array
    {
        return [
            'start' => 'immutable_datetime',
            'end' => 'immutable_datetime',
        ];
    }

    public function schedulable(): MorphTo
    {
        return $this->morphTo();
    }

    protected $connection = 'app';
}
