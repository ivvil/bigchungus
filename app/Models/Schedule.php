<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property int $id
 * @property int $enabled
 * @property \Carbon\CarbonImmutable $start
 * @property \Carbon\CarbonImmutable $end
 * @property string $schedulable_type
 * @property string $schedulable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Model|\Eloquent $schedulable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereSchedulableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereSchedulableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule withoutTrashed()
 * @mixin \Eloquent
 */
class Schedule extends Model
{
    use HasFactory;
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
