<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'address' => fake()->address(),
            'minimum_age' => fake()->randomElement([3, 4, 5, 6, 7]),
            'admin_id' => Admin::inRandomOrder()->first()
        ];
    }
}
