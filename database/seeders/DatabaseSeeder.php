<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use App\Models\Valve;
use App\Models\Zone;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Valve::factory()
            ->count(10)
            ->withStatus()
            ->create();

        Zone::factory()
            ->count(5)
            ->withValves(3)
            ->create();

        Event::factory()
            ->count(50)
            ->forValve()
            ->create();
    }
}
