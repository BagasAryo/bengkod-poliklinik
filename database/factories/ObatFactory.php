<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_obat' => $this->faker->word(),
            'kemasan' => $this->faker->randomElement(['Tablet', 'Kapsul', 'Sirup', 'Salep']),
            'harga' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
