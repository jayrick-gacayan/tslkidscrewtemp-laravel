<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static ?string $password;

    public function definition(): array
    {
        return [
            "name" => fake()->name,
            "email" => fake()->unique()->safeEmail(),
            "password" => static::$password ??= Hash::make('password'),
            "is_super_admin" => fake()->boolean(),
            "is_active" => fake()->boolean(),
            "admin_id" => Admin::where('is_super_admin', true)->get()->random(),
        ];
    }
}