<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelayanan;
use App\Models\Jemaat;
use App\Models\Keuangan;
use App\Models\Sakramen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the church landing page.
     */
    public function index()
    {
        // 1. Fetch upcoming service schedules
        $upcomingSchedules = JadwalPelayanan::with('petugas.jemaat')
            ->where('waktu_mulai', '>=', now()->subHours(3))
            ->orderBy('waktu_mulai', 'asc')
            ->take(3)
            ->get();

        // 2. Fetch basic statistics for the landing page
        $totalJemaat = Jemaat::where('status_anggota', 'Aktif')->count();
        $totalSakramen = Sakramen::count();

        // 3. Fetch financial summary (Pemasukan vs Pengeluaran)
        $pemasukan = Keuangan::where('tipe', 'Pemasukan')->sum('jumlah');
        $pengeluaran = Keuangan::where('tipe', 'Pengeluaran')->sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;
        
        $latestTransactions = Keuangan::orderBy('tanggal_transaksi', 'desc')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('welcome', compact(
            'upcomingSchedules',
            'totalJemaat',
            'totalSakramen',
            'pemasukan',
            'pengeluaran',
            'saldo',
            'latestTransactions'
        ));
    }
}
