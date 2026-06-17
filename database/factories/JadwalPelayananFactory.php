<?php

namespace Database\Factories;

use App\Models\JadwalPelayanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalPelayanan>
 */
class JadwalPelayananFactory extends Factory
{
    protected $model = JadwalPelayanan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('now', '+1 month');
        $end = (clone $start)->modify('+2 hours');

        return [
            'nama_kegiatan' => $this->faker->randomElement(['Ibadah Raya', 'Ibadah Pemuda', 'Sekolah Minggu', 'Doa Malam']),
            'waktu_mulai' => $start,
            'waktu_selesai' => $end,
            'lokasi' => 'Gereja Pusat - ' . $this->faker->randomElement(['Aula Utama', 'Ruang Serbaguna', 'Lantai 2']),
            'deskripsi' => $this->faker->paragraph(),
        ];
    }
}
