<?php

namespace Database\Factories;

use App\Models\Jemaat;
use App\Models\Sakramen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sakramen>
 */
class SakramenFactory extends Factory
{
    protected $model = Sakramen::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jemaat_id' => Jemaat::factory(),
            'jenis_sakramen' => $this->faker->randomElement(['Baptis', 'Komuni', 'Krisma', 'Pernikahan', 'Kematian']),
            'tanggal_pelaksanaan' => $this->faker->date(),
            'tempat_pelaksanaan' => 'Gereja Pusat',
            'pendeta_pelayan' => 'Pdt. ' . $this->faker->name(),
            'catatan' => $this->faker->sentence(),
        ];
    }
}
