<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Ubication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'isbn' => $this->faker->isbn13(),
            'cover' => $this->faker->imageUrl,
            'year_publication' => $this->faker->year,
            'status' => $this->faker->randomElement(['disponible', 'prestado', 'extraviado']),
            'author_id' => Author::all()->random()->id,
            'ubication_id' => Ubication::all()->random()->id,
        ];
    }
}
