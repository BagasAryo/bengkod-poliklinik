<?php

namespace Database\Factories;

use App\Models\DaftarPoli;
use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periksa>
 */
class PeriksaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_daftar_poli' => DaftarPoli::inRandomOrder()->first()->id,
            'tgl_periksa' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'catatan' => $this->faker->sentence(),
            'biaya_periksa' => $this->faker->numberBetween(10000, 500000),
        ];
    }
}
