<?php

namespace Database\Factories;

use App\Models\Schedule;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = CarbonImmutable::now()->addDays($this->faker->numberBetween(1, 30));

        return [
            'enabled' => $this->faker->boolean(80),
            'start' => $start,
            'end' => $start->addHours($this->faker->numberBetween(1, 8)),
            'schedulable_type' => $this->faker->randomElement([
                \App\Models\Valve::class,
                \App\Models\Zone::class
            ]),
            'schedulable_id' => match (class_basename($this->faker->randomElement([
                \App\Models\Valve::class,
                \App\Models\Zone::class
            ]))) {
                'Valve' => \App\Models\Valve::factory(),
                'Zone' => \App\Models\Zone::factory(),
            },
        ];
    }

    public function forValve($valve = null): Factory
    {
        return $this->state([
            'schedulable_type' => \App\Models\Valve::class,
            'schedulable_id' => $valve?->valve_id ?? \App\Models\Valve::factory(),
        ]);
    }

    public function forZone($zone = null): Factory
    {
        return $this->state([
            'schedulable_type' => \App\Models\Zone::class,
            'schedulable_id' => $zone?->id ?? \App\Models\Zone::factory(),
        ]);
    }

    public function active(): Factory
    {
        $now = CarbonImmutable::now();
        return $this->state([
            'start' => $now->subHours(2),
            'end' => $now->addHours(2),
        ]);
    }

    public function expired(): Factory
    {
        return $this->state(function (array $attributes) {
            $start = CarbonImmutable::now()->subDays(7);
            return [
                'start' => $start,
                'end' => $start->addHour(),
            ];
        });
    }

    public function enabled(bool $state = true): Factory
    {
        return $this->state(['enabled' => $state]);
    }

    public function disabled(): Factory
    {
        return $this->enabled(false);
    }

    public function withDuration(int $hours): Factory
    {
        return $this->state(function (array $attributes) use ($hours) {
            return [
                'end' => CarbonImmutable::parse($attributes['start'])->addHours($hours),
            ];
        });
    }

    public function trashed(): Factory
    {
        return $this->state(['deleted_at' => CarbonImmutable::now()->subDay()]);
    }
}
