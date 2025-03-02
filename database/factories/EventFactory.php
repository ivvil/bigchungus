<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Valve;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement([
                'activation',
                'deactivation',
                'error',
                'maintenance',
                'status_change'
            ]),
            'time' => CarbonImmutable::now()->subMinutes(
                $this->faker->numberBetween(0, 43200) // Up to 30 days old
            ),
            'description' => $this->faker->sentence(8),
        ];
    }

    public function forValve(Valve $valve): static
    {
        return $this->state([
            'triggerer_id' => $valve->valve_id,
        ]);
    }

    public function withType(string $type): static
    {
        return $this->state(['type' => $type]);
    }

    public function recent(): static
    {
        return $this->state([
            'time' => CarbonImmutable::now()->subMinutes(15)
        ]);
    }

    public function prunable(): static
    {
        return $this->state([
            'created_at' => CarbonImmutable::now()->subMonths(2)
        ]);
    }

    public function withLongDescription(): static
    {
        return $this->state([
            'description' => $this->faker->paragraph(3)
        ]);
    }
}
