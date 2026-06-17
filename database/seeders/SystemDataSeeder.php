<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use App\Models\JadwalPelayanan;
use App\Models\Jemaat;
use App\Models\Keuangan;
use App\Models\PetugasPelayanan;
use App\Models\Sakramen;
use App\Models\User;
use Illuminate\Database\Seeder;

class SystemDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some users for attribution
        $admin = User::where('role', 'Admin')->first() ?? User::factory()->create(['role' => 'Admin']);
        $bendahara = User::where('role', 'Bendahara')->first() ?? User::factory()->create(['role' => 'Bendahara']);

        // Seed Jemaat
        $jemaats = Jemaat::factory(50)->create();

        // Seed Inventaris
        Inventaris::factory(20)->create();

        // Seed Keuangan
        Keuangan::factory(30)->create([
            'created_by' => $bendahara->id,
        ]);

        // Seed Jadwal Pelayanan
        $jadwals = JadwalPelayanan::factory(10)->create();

        // Seed Petugas Pelayanan (assigning random jemaat to random jadwal)
        foreach ($jadwals as $jadwal) {
            PetugasPelayanan::factory(3)->create([
                'jadwal_pelayanan_id' => $jadwal->id,
                'jemaat_id' => $jemaats->random()->id,
            ]);
        }

        // Seed Sakramen
        Sakramen::factory(15)->create([
            'jemaat_id' => fn() => $jemaats->random()->id,
        ]);
    }
}
