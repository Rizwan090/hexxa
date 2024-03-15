<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => category::factory(),
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(12, true),
            'slug' => $this->faker->slug,
            'price' => null,
            'published_at' => now(),

        ];
    }
}
