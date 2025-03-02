<?php

namespace Database\Factories;

use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zone>
 */
class ZoneFactory extends Factory
{
    protected $model = Zone::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->city() . ' Irrigation Zone',
            'description' => fake()->sentence(10),
        ];
    }

    public function withValves(int $count = 1): Factory
    {
        return $this->hasAttached(
            \App\Models\Valve::factory()->count($count),
            [],
            'valves'
        );
    }

    public function withSchedules(int $count = 1): Factory
    {
        return $this->has(
            \App\Models\Schedule::factory()->count($count)
                ->state(fn() => [
                    'schedulable_type' => Zone::class,
                    'schedulable_id' => Zone::factory()
                ]),
            'schedules'
        );
    }

    public function trashed(): Factory
    {
        return $this->state(fn() => [
            'deleted_at' => now()->subDay(),
        ]);
    }

    public function withDescription(): Factory
    {
        return $this->state(fn() => [
            'description' => fake()->paragraph(),
        ]);
    }
}
