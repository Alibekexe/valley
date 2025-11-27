<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Profile;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->paragraph(2), // Generates 2 paragraphs of text
            'like' => fake()->numberBetween(0, 1000), // Random number of likes between 0 and 1000
            'post_id' => Post::inRandomOrder()->first()?->id 
                        ?? Post::factory(),
            'profile_id' => Profile::inRandomOrder()->first()?->id 
                          ?? Profile::factory(),
            'parent_id' => fake()->optional(0.3, null)
                          ->passthrough(
                              Comment::inRandomOrder()->first()?->id 
                              ?? null
                          ),
            'created_at' => fake()->dateTimeBetween('-1 year'),
            'updated_at' => now(),
        ];
    }
}
