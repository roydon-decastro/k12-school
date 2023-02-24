<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([101, 102, 103, 201, 202, 203, 301, 302, 303]),
            'school_id' => $this->faker->numberBetween(1, 5),
            'building_id' => 1,
            'use' => 'classroom',
            'capacity' => $this->faker->randomElement([30, 35, 40]),

        ];
    }
}
