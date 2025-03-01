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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Valve query()
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
        return $this->belongsToMany(Zone::class);
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function schedules(): MorphMany
    {
        return $this->morphMany(Schedule::class, 'schedulable');
    }
}
