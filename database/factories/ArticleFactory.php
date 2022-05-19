<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'text' => $this->faker->realText(140),
            'time' => $this->faker->numberBetween(1, 24),
            'genre' => $this->faker->randomElement(['PHP', 'Ruby', 'Python', 'JavaScript']),
            'created_at' => $this->faker->dateTimeBetween('-10days', '10days'),
        ];
    }
}
