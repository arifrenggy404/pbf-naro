@extends('layouts.app')

@section('title', 'Laporan Jemaat')
@section('page_title', 'Laporan Data Jemaat')

@section('content')
<div class="content-card">
    <div style="margin-bottom: 20px; display: flex; justify-content: flex-end;">
        <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Laporan</button>
    </div>

    <div class="table-container" id="printable-area">
        <h2 style="text-align: center; margin-bottom: 20px;">Daftar Jemaat Gereja</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Bergabung</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jemaat as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tanggal_lahir->format('d M Y') }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->status_anggota }}</td>
                    <td>{{ $item->tanggal_bergabung->format('Y') }}</td>
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
