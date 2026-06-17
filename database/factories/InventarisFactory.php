<?php

namespace Database\Factories;

use App\Models\Inventaris;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventaris>
 */
class InventarisFactory extends Factory
{
    protected $model = Inventaris::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barang' => 'INV-' . strtoupper($this->faker->bothify('??###')),
            'nama_barang' => $this->faker->words(3, true),
            'jumlah' => $this->faker->numberBetween(1, 50),
            'kondisi' => $this->faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
            'tanggal_pengadaan' => $this->faker->date(),
            'nilai_perolehan' => $this->faker->randomFloat(2, 50000, 5000000),
        ];
    }
}
