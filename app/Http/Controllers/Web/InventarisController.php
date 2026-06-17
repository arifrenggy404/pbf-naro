<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventaris\StoreInventarisRequest;
use App\Services\InventarisService;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    protected $service;

    public function __construct(InventarisService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $items = $this->service->listItems($request->all());
        $summary = $this->service->getAssetReport();
        return view('inventaris.index', compact('items', 'summary'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(StoreInventarisRequest $request)
    {
        $this->service->createItem($request->validated());
        return redirect()->route('inventaris.index')->with('success', 'Barang inventaris berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = $this->service->getItem($id);
        return view('inventaris.edit', compact('item'));
    }

    public function update(StoreInventarisRequest $request, $id)
    {
        $this->service->updateItem($id, $request->validated());
        return redirect()->route('inventaris.index')->with('success', 'Barang inventaris berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->service->deleteItem($id);
        return redirect()->route('inventaris.index')->with('success', 'Barang inventaris berhasil dihapus.');
    }

    public function report()
    {
        $items = $this->service->listItems([]);
        return view('inventaris.report', compact('items'));
    }
}
