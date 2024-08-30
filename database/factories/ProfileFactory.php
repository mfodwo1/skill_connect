<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'bio' => $this->faker->text,
            'skills' => $this->faker->words(3, true),
            'portfolio_url' => "profile.jpg",
            'location' => $this->faker->address,
            'rating' => $this->faker->randomFloat(2, 1, 5),
            'verified' => $this->faker->boolean,
            'availability' => $this->faker->boolean,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
