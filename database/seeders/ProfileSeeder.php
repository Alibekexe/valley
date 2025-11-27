<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, create users
        $users = User::factory(40)->create([
            'password' => Hash::make('password'), // Default password for all users
        ]);

        // Then create a profile for each user
        $users->each(function ($user) {
            Profile::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
