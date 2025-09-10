<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating all database records...');

        // Создаем пользователя (проверяем существование)
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'alice@techworld.com'],
            [
                'name' => 'Alice TechMaster',
                'password' => bcrypt('securepass456'),
            ]
        );

        // Создаем роли (проверяем существование)
        $adminRole = \App\Models\Role::firstOrCreate(['title' => 'super_admin']);
        $moderatorRole = \App\Models\Role::firstOrCreate(['title' => 'moderator']);
        $editorRole = \App\Models\Role::firstOrCreate(['title' => 'content_editor']);

        // Создаем категорию (проверяем существование)
        $category = \App\Models\Category::firstOrCreate(['title' => 'Web Development']);

        // Создаем теги (проверяем существование)
        $tag1 = \App\Models\Tag::firstOrCreate(['title' => 'JavaScript']);
        $tag2 = \App\Models\Tag::firstOrCreate(['title' => 'React']);
        $tag3 = \App\Models\Tag::firstOrCreate(['title' => 'Node.js']);

        // Создаем изображение (проверяем существование)
        $image = \App\Models\Image::firstOrCreate(['path' => 'posts/webdev-banner.jpg']);

        // Создаем пост (проверяем существование)
        $post = \App\Models\Post::firstOrCreate(
            ['title' => 'Modern Web Development with React and Node.js'],
            [
                'description' => 'Complete guide to building full-stack applications using modern JavaScript technologies',
                'author' => 'Alice TechMaster',
                'tag' => 'JavaScript, React, Node.js',
                'img_path' => 'posts/webdev-banner.jpg',
                'content' => 'In this comprehensive guide, we will explore modern web development techniques using React for frontend and Node.js for backend. We will cover topics like component architecture, state management with Redux, API development with Express.js, database integration with MongoDB, and deployment strategies. This tutorial is perfect for developers who want to stay up-to-date with current industry standards.',
                'category' => 'Web Development',
                'status' => 'published',
                'published_at' => now(),
            ]
        );

        // Создаем комментарий (проверяем существование)
        $comment = \App\Models\Comment::firstOrCreate(
            ['post_id' => $post->id, 'author' => 'Bob Developer'],
            [
                'content' => 'Excellent tutorial! The examples are very clear and practical.',
                'like' => 12,
            ]
        );

        // Создаем чат (проверяем существование)
        $chat = \App\Models\Chat::firstOrCreate(
            ['title' => 'Web Development Community'],
            ['author' => 'Alice TechMaster']
        );

        // Создаем сообщение (проверяем существование)
        $message = \App\Models\Message::firstOrCreate(
            ['chat_id' => $chat->id, 'author' => 'Alice TechMaster'],
            ['content' => 'Welcome everyone to our web development community! Feel free to ask questions and share your projects.']
        );

        // Создаем профиль (проверяем существование)
        $profile = \App\Models\Profile::firstOrCreate(
            ['login' => 'alicetech'],
            [
                'name' => 'Alice',
                'surname' => 'TechMaster',
                'age' => 32,
                'description' => 'Senior Full-Stack Developer with 8 years of experience in modern web technologies. Passionate about teaching and sharing knowledge.',
                'phone' => '+1987654321',
                'address' => '456 Innovation Drive, Tech Valley, CA 90210',
            ]
        );

        $this->info('All records created/updated successfully!');
        $this->info('User: ' . $user->name . ' (ID: ' . $user->id . ')');
        $this->info('Post: ' . $post->title . ' (ID: ' . $post->id . ')');
        $this->info('Category: ' . $category->title . ' (ID: ' . $category->id . ')');
        $this->info('Tags: ' . $tag1->title . ', ' . $tag2->title . ', ' . $tag3->title);
        $this->info('Roles: ' . $adminRole->title . ', ' . $moderatorRole->title . ', ' . $editorRole->title);
        $this->info('Comment: ' . $comment->content);
        $this->info('Chat: ' . $chat->title);
        $this->info('Message: ' . $message->content);
        $this->info('Profile: ' . $profile->name . ' ' . $profile->surname);
    }
}
