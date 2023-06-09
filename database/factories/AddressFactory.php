<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => fake()->city,
            'name_given_by_customer' => fake()->word,
            'street' => fake()->streetName,
            'house' => fake()->buildingNumber,
            'floor' => fake()->numberBetween(1, 20),
            'apartment' => fake()->numberBetween(1, 100),
            'intercom_code' => fake()->randomNumber(4),
            'added_date' => fake()->dateTime,
        ];
    }
}
