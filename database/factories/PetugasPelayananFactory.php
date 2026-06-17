<?php

namespace Database\Factories;

use App\Models\JadwalPelayanan;
use App\Models\Jemaat;
use App\Models\PetugasPelayanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetugasPelayanan>
 */
class PetugasPelayananFactory extends Factory
{
    protected $model = PetugasPelayanan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jadwal_pelayanan_id' => JadwalPelayanan::factory(),
            'jemaat_id' => Jemaat::factory(),
            'peran' => $this->faker->randomElement(['Pemusik', 'Singer', 'WL', 'Penyambut Tamu', 'Kolektan']),
        ];
    }
}
