<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
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

        $posts = Post::all();
        $imagePaths = [
            'sample1.jpg',
            'sample2.jpg',
            'sample3.jpg',
            'sample4.jpg',
            'sample5.jpg',
        ];

        // Create images and attach to posts
        $posts->each(function ($post) use ($imagePaths) {
            // Each post gets 1-3 random images
            $imageCount = rand(1, 3);
            $selectedImages = array_rand(array_flip($imagePaths), $imageCount);
            
            if (!is_array($selectedImages)) {
                $selectedImages = [$selectedImages];
            }

            foreach ($selectedImages as $imagePath) {
                $image = Image::firstOrCreate(
                    ['path' => $imagePath],
                    ['path' => $imagePath]
                );

                // Attach image to post if not already attached
                if (!$post->images()->where('image_id', $image->id)->exists()) {
                    $post->images()->attach($image->id);
                }
            }
        });
    }
}
