<?php

namespace App\Services;

use App\Repositories\JadwalRepository;
use Illuminate\Support\Facades\Log;
use Exception;

class JadwalService
{
    protected $repository;

    public function __construct(JadwalRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listSchedules(array $filters)
    {
        return $this->repository->getAll($filters);
    }

    public function createSchedule(array $data)
    {
        try {
            $jadwalData = collect($data)->except('petugas')->toArray();
            $petugas = $data['petugas'] ?? [];
            
            return $this->repository->create($jadwalData, $petugas);
        } catch (Exception $e) {
            Log::error("Gagal membuat jadwal pelayanan: " . $e->getMessage());
            throw $e;
        }
    }

    public function getSchedule(int $id)
    {
        return $this->repository->findById($id);
    }

    public function updateSchedule(int $id, array $data)
    {
        try {
            $jadwalData = collect($data)->except('petugas')->toArray();
            $petugas = $data['petugas'] ?? [];

            return $this->repository->update($id, $jadwalData, $petugas);
        } catch (Exception $e) {
            Log::error("Gagal memperbarui jadwal pelayanan ID {$id}: " . $e->getMessage());
            throw $e;
        }
    }

    public function deleteSchedule(int $id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $e) {
            Log::error("Gagal menghapus jadwal pelayanan ID {$id}: " . $e->getMessage());
            throw $e;
        }
    }
}
