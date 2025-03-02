<?php

namespace Database\Factories;

use App\Models\Valve;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Valve>
 */
class ValveFactory extends Factory
{
    protected $model = Valve::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'valve_id' => 'valve-' . Str::uuid(),
            'location' => fake()->city . ' Irrigation Valve',
        ];
    }

      public function withStatus(): Factory
    {
        return $this->has(
            \App\Models\Status::factory()->state([
                'status' => \App\Enum\ValveStatus::CLOSED
            ]),
            'status'
        );
    }

    public function withZones(int $count = 1): Factory
    {
        return $this->hasAttached(
            Zone::factory()->count($count),
            [],
            'zones'
        );
    }

    public function withSchedules(int $count = 1): Factory
    {
        return $this->has(
            \App\Models\Schedule::factory()->count($count),
            'schedules'
        );
    }

    public function withEvents(int $count = 3): Factory
    {
        return $this->has(
            \App\Models\Event::factory()->count($count),
            'events'
        );
    }

    public function trashed(): Factory
    {
        return $this->state(fn () => [
            'deleted_at' => now()->subDay(),
        ]);
    }
}
