<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
            'lokasi' => $this->faker->address,
            'status' => $this->faker->randomElement(['Ringan', 'Sedang', 'Berat']),
            'kategori' => $this->faker->randomElement(['kebersihan', 'keamanan', 'infrastruktur', 'kesehatan', 'pendidikan', 'lingkungan']),
            'tanggal' => $this->faker->date,
            'pelapor_id' => \App\Models\User::factory(),
        ];
    }
}
