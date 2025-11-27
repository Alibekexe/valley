<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // If no chats exist, create some
        if (Chat::count() === 0) {
            $this->call([ChatSeeder::class]);
        }

        // Create 50 messages in random chats
        Message::factory()
            ->count(50)
            ->create([
                'chat_id' => fn() => Chat::inRandomOrder()->first()->id
            ]);
    }
}
