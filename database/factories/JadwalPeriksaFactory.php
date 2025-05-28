<?php

namespace Database\Factories;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalPeriksa>
 */
class JadwalPeriksaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_dokter' => Dokter::inRandomOrder()->first()->id,
            'hari' => $this->faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']),
            'jam_mulai' => $this->faker->time('H:i'),
            'jam_selesai' => $this->faker->time('H:i'),
        ];
    }
}
