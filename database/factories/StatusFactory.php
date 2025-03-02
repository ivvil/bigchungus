<?php

namespace Database\Factories;

use App\Enum\ValveStatus;
use App\Models\Status;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    protected $model = Status::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(ValveStatus::cases()),
            'valve_id' => \App\Models\Valve::factory(),
        ];
    }

    public function forValve(\App\Models\Valve $valve): self
    {
        return $this->state([
            'valve_id' => $valve->valve_id,
        ]);
    }

    public function withStatus(ValveStatus $status): self
    {
        return $this->state([
            'status' => $status,
        ]);
    }

    public function prunable(): self
    {
        return $this->state([
            'created_at' => CarbonImmutable::now()->subMonths(2),
        ]);
    }

    public function withTimestamps(CarbonImmutable $time): self
    {
        return $this->state([
            'created_at' => $time,
            'updated_at' => $time,
        ]);
    }
}
