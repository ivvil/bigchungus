<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 *
 *
 * @property string $valve_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $location
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Event> $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Schedule> $schedules
 * @property-read int|null $schedules_count
 * @property-read \App\Models\Status|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Zone> $zones
 * @property-read int|null $zones_count
 * @method static \Database\Factories\ValveFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve whereValveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve withoutTrashed()
 * @mixin \Eloquent
 */
class Valve extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Set the pk (valve_id) to non incrementing and a string
    protected $primaryKey = 'valve_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $connection = 'app';

    public $fillable = [
        'location',
    ];

    public function zones(): BelongsToMany
    {
        return $this->belongsToMany(Zone::class, 'valve_zone', 'valve_id', 'zone_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'valve_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'valve_id', 'triggerer_id');
    }

    public function schedules(): MorphMany
    {
        return $this->morphMany(Schedule::class, 'schedulable');
    }
}
