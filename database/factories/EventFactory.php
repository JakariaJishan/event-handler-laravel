<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_time' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'end_time' => $this->faker->dateTimeBetween('+2 weeks', '+3 weeks'),
            'location' => $this->faker->address(),
            'google_meet_link' => $this->faker->url(),
            'visibility' => $this->faker->randomElement(['public', 'private']),
            'reminder_time' => $this->faker->randomElement(['15min', '30min', '1hr', '2hr', '1day']),
            'repeat_time' => $this->faker->randomElement(['all day', 'sat', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri']),
        ];
    }
}
