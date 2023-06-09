<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blocked' => fake()->boolean,
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'phone' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
            'registration_date' => fake()->dateTime,
        ];
    }
}
