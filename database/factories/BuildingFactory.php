<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['HS Bldg 1', 'HS Bldg 2', 'HS Bldg 3',  'Elem Bldg 2', 'Elem Bldg 1']),
            'school_id' => $this->faker->numberBetween(1, 5),
            'floors' => $this->faker->numberBetween(1, 4),
        ];
    }
}
