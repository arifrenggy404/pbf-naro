@extends('layouts.app')

@section('title', 'Laporan Inventaris')
@section('page_title', 'Laporan Inventaris & Aset')

@section('content')
<div class="content-card">
    <div style="margin-bottom: 20px; display: flex; justify-content: flex-end;">
        <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Laporan</button>
    </div>

    <div class="table-container" id="printable-area">
        <h2 style="text-align: center; margin-bottom: 20px;">Daftar Inventaris Gereja</h2>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Tanggal Pengadaan</th>
                    <th>Nilai Perolehan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td>{{ $item->tanggal_pengadaan->format('d M Y') }}</td>
                    <td>Rp {{ number_format($item->nilai_perolehan, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
@media print {
    .btn, .sidebar, .header-dashboard, form {
        display: none !important;
    }
    .content-card {
        box-shadow: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    body {
        background: white !important;
    }
    table {
        width: 100% !important;
        border-collapse: collapse !important;
    }
    th, td {
        border: 1px solid #ddd !important;
        padding: 8px !important;
    }
}
</style>
@endsection
