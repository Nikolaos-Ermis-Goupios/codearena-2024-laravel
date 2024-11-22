<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
            'user_id' => null, // Nullable by default
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->sentence(10),
            'image' => 'https://picsum.photos/id/' . $this->faker->numberBetween(1, 50) . '/800/400',
            'body' => $this->faker->paragraph(10),
            'slug' => $this->faker->slug(),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'promoted' => $this->faker->boolean(50), // 50% chance of being promoted
            'created_at' => now()->subDays(rand(1, 10)),
            'updated_at' => now(),
        ];
    }

    //Seperatly adding the user id for pagination test
    public function withUser()
    {
        return $this->state(function () {
            return [
                'user_id' => User::factory(),
            ];
        });
    }
}
