<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'studio' => $this->faker->randomElement(['スタジオA', 'スタジオB', 'スタジオC']),
            'band_id' => $this->faker->numberBetween(1, 20),
            'date' =>  $this->faker->dateTimeBetween('-15day', '15day')->format('Y-m-d'),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
        ];
    }
}
