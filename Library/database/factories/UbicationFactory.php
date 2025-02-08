<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ubication>
 */
class UbicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'library_name' => $this->faker->name,
            'address' => $this->faker->address,
            'num_shelves' => $this->faker->numberBetween(1, 500),
        ];
    }
}
