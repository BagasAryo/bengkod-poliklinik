<?php

namespace Database\Factories;

use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarPoli>
 */
class DaftarPoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pasien' => Pasien::inRandomOrder()->first()->id,
            'id_jadwal' => JadwalPeriksa::inRandomOrder()->first()->id,
            'keluhan' => $this->faker->sentence(),
            'no_antrian' => $this->faker->unique()->numerify('##'),
        ];
    }
}
