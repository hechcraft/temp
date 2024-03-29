<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rawg_id' => $this->faker->randomNumber(5, true),
            'slug' => $this->faker->word,
            'name' => $this->faker->word,
            'released' => $this->faker->date('Y_m_d'),
        ];
    }
}
