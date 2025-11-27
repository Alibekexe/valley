<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $posts = Post::factory(100)->create();
       $tags = Tag::all();
       
       foreach ($posts as $post) {
           $randomTags = $tags->random(rand(1, 5))->pluck('id');
           $post->tags()->sync($randomTags);
       }
    }
}
