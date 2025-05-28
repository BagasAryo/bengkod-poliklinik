<?php

namespace Database\Factories;

use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPeriksa>
 */
class DetailPeriksaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_periksa' => Periksa::inRandomOrder()->first()->id,
            'id_obat' => Obat::inRandomOrder()->first()->id,
        ];
    }
}
