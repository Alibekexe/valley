<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // If no posts exist, create some
        if (Post::count() === 0) {
            $this->call([PostSeeder::class]);
        }

        // Get all posts and profiles
        $posts = Post::all();
        $profiles = Profile::all();

        // Create 5-10 top-level comments for each post
        $posts->each(function ($post) use ($profiles) {
            $commentCount = rand(5, 10);
            
            for ($i = 0; $i < $commentCount; $i++) {
                $comment = Comment::factory()->create([
                    'post_id' => $post->id,
                    'author' => $profiles->random()->user->name,
                    'content' => fake()->paragraph(rand(1, 3)),
                ]);

                // 30% chance to create 1-3 replies for each comment
                if (rand(1, 100) <= 30) {
                    $replyCount = rand(1, 3);
                    
                    for ($j = 0; $j < $replyCount; $j++) {
                        Comment::factory()->create([
                            'post_id' => $post->id,
                            'parent_id' => $comment->id,
                            'author' => $profiles->random()->user->name,
                            'content' => fake()->paragraph(rand(1, 2)),
                        ]);
                    }
                }
            }
        });
    }
}
