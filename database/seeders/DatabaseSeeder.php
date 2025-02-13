<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create users & posts
        User::factory()
            ->count(5)
            ->create()
            ->each(function ($user) {
                Post::factory()
                    ->count(10)
                    ->withUser($user->id)
                    ->create();
            });
    }
}
