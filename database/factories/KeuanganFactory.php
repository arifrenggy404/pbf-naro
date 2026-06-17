<?php

namespace Database\Factories;

use App\Models\Keuangan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keuangan>
 */
class KeuanganFactory extends Factory
{
    protected $model = Keuangan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_transaksi' => 'TRX-' . strtoupper($this->faker->bothify('??###')),
            'tipe' => $this->faker->randomElement(['Pemasukan', 'Pengeluaran']),
            'kategori' => $this->faker->randomElement(['Persembahan', 'Donasi', 'Biaya Listrik', 'Gaji', 'Pemeliharaan']),
            'jumlah' => $this->faker->randomFloat(2, 10000, 1000000),
            'tanggal_transaksi' => $this->faker->date(),
            'keterangan' => $this->faker->sentence(),
            'created_by' => User::factory(),
        ];
    }
}
