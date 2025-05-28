<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poli>
 */
class PoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_poli' => $this->faker->unique()->randomElement([
                'Poli Umum',
                'Poli Gigi',
                'Poli Anak',
                'Poli Kandungan',
                'Poli Mata',
            ]),
            'keterangan' => $this->faker->sentence(10),
        ];
    }
}
