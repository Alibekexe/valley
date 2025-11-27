<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(18, 80),
            'description' => $this->faker->paragraph(3, true),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'login' => $this->faker->unique()->userName(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
