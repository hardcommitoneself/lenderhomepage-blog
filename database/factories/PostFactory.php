<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'image' => 'https://picsum.photos/seed/' . $this->faker->word() . '/360/240',
        ];
    }

    public function withUser($userId)
    {
        return $this->state([
            'user_id' => $userId
        ]);
    }
}
