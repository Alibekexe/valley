<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 chats
        $chats = Chat::factory()
            ->count(10)
            ->create();

        // For each chat, create 5-10 messages
        $chats->each(function ($chat) {
            $profiles = Profile::inRandomOrder()->limit(rand(2, 5))->get();
            
            Message::factory()
                ->count(rand(5, 10))
                ->create([
                    'chat_id' => $chat->id,
                    'author' => fn() => $profiles->random()->user->name
                ]);
        });
    }
}
