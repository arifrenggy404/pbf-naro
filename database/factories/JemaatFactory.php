<?php

namespace Database\Factories;

use App\Models\Jemaat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jemaat>
 */
class JemaatFactory extends Factory
{
    protected $model = Jemaat::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-20 years'),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'telepon' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'status_anggota' => $this->faker->randomElement(['Aktif', 'Pindah', 'Meninggal']),
            'tanggal_bergabung' => $this->faker->date('Y-m-d', '-5 years'),
            'last_data_update' => now(),
        ];
    }
}
