<?php

namespace App\Services;

use App\Repositories\InventarisRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class InventarisService
{
    protected $repository;

    public function __construct(InventarisRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listItems(array $filters)
    {
        return $this->repository->getAll($filters);
    }

    public function createItem(array $data)
    {
        try {
            return DB::transaction(function () use ($data) {
                return $this->repository->create($data);
            });
        } catch (Exception $e) {
            Log::error("Gagal menambah inventaris: " . $e->getMessage());
            throw $e;
        }
    }

    public function getItem(int $id)
    {
        return $this->repository->findById($id);
    }

    public function updateItem(int $id, array $data)
    {
        try {
            return DB::transaction(function () use ($id, $data) {
                return $this->repository->update($id, $data);
            });
        } catch (Exception $e) {
            Log::error("Gagal memperbarui inventaris ID {$id}: " . $e->getMessage());
            throw $e;
        }
    }

    public function deleteItem(int $id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $e) {
            Log::error("Gagal menghapus inventaris ID {$id}: " . $e->getMessage());
            throw $e;
        }
    }

    public function getAssetReport()
    {
        return $this->repository->getAssetSummary();
    }
}
