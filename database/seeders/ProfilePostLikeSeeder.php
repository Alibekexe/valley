<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Profile;
use App\Models\ProfilePostLike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilePostLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // If no posts or profiles exist, create them
        if (Post::count() === 0) {
            $this->call([PostSeeder::class]);
        }
        
        if (Profile::count() === 0) {
            $this->call([ProfileSeeder::class]);
        }

        $posts = Post::all();
        $profiles = Profile::all();

        // For each post, create 0-10 likes from random profiles
        $posts->each(function ($post) use ($profiles) {
            $likeCount = rand(0, 10);
            $profiles->random(min($likeCount, $profiles->count()))
                ->each(function ($profile) use ($post) {
                    // Check if this profile already liked the post
                    if (!$post->likes()->where('profile_id', $profile->id)->exists()) {
                        ProfilePostLike::create([
                            'post_id' => $post->id,
                            'profile_id' => $profile->id,
                        ]);
                    }
                });
        });
    }
}
