<?php

namespace Database\Seeders;

use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Periksa;
use App\Models\Poli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create dummy data for Poli
        $polis = Poli::factory()->count(3)->create();

        // Create dummy data for Dokter, assign each doctor to a Poli
        $polis->each(function ($poli) {
            Dokter::factory()->create([
                'id_poli' => $poli->id,
            ]);
        });

        // Create dummy data for Dokter, take all doctors and create a schedule for each
        $dokters = Dokter::all();
        $dokters->each(function ($dokter) {
            JadwalPeriksa::factory()->create([
                'id_dokter' => $dokter->id
            ]);
        });

        // Create dummy data for Pasien
        Pasien::factory()->count(3)->create();

        // Create dummy data for Obat
        Obat::factory()->count(3)->create();

        // Create dummy data for DaftarPoli, linking to existing JadwalPeriksa and Pasien
        $pasiens = Pasien::all();
        $jadwals = JadwalPeriksa::all();

        foreach ($pasiens as $i => $pasien) {
            $jadwal = $jadwals->random();

            $daftar = DaftarPoli::factory()->create([
                'id_pasien' => $pasien->id,
                'id_jadwal' => $jadwal->id,
                'no_antrian' => $i + 1, // Assign a unique queue number
            ]);

            $periksa = Periksa::factory()->create([
                'id_daftar_poli' => $daftar->id
            ]);

            // Tambahkan obat
            $obats = Obat::inRandomOrder()->limit(rand(1, 3))->get();
            foreach ($obats as $obat) {
                DetailPeriksa::factory()->create([
                    'id_periksa' => $periksa->id,
                    'id_obat' => $obat->id
                ]);
            }
        }
    }
}
