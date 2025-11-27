<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        if (!Profile::count()) {
            Profile::factory()->create();
        }

        return [
            'title' => fake()->realTextBetween(10, 20),
            'description' => fake()->realTextBetween(20, 50),
            'profile_id' => Profile::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'img_path' => fake()->imageUrl,
            'content' => fake()->realTextBetween(10, 50),
            'published_at' => fake()->dateTime,
            'status' => fake()->randomElement(['draft', 'published', 'archived']),
        ];
    }
}
