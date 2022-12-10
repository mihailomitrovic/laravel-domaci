<?php

namespace Database\Factories;

use App\Models\Director;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'year' => $this->faker->year($max = 'now'),
            'tagline' => $this->faker->sentence(),
            'synopsis' => $this->faker->paragraph(),
            'genre' => Genre::factory(),
            'director' => Director::factory(),
            'user' => User::factory(),
        ];
    }
}
