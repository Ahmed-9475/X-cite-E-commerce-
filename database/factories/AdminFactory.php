<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            "name"=>  fake()->name(),
            "email"=> fake()->unique()->safeEmail(),
            "password"=> Hash::make("123456789"),
            "user_name"=> fake()->unique()->name(),
            "phone_number"=> fake()->unique()->phoneNumber(),
            "super_admin"=> fake()->boolean(),
            // "status"=> fake()->unique()->phoneNumber(),
        ];
    }
}
