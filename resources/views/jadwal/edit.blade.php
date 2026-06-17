@extends('layouts.app')

@section('title', 'Edit Jadwal')
@section('page_title', 'Edit Jadwal Pelayanan')

@section('content')
<div class="content-card" style="max-width: 800px; margin: 0 auto;">
    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group" style="grid-column: span 2;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $jadwal->nama_kegiatan) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Waktu Mulai</label>
                <input type="datetime-local" name="waktu_mulai" value="{{ old('waktu_mulai', $jadwal->waktu_mulai->format('Y-m-d\TH:i')) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Waktu Selesai</label>
                <input type="datetime-local" name="waktu_selesai" value="{{ old('waktu_selesai', $jadwal->waktu_selesai->format('Y-m-d\TH:i')) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $jadwal->lokasi) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Deskripsi</label>
                <textarea name="deskripsi" rows="3" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">{{ old('deskripsi', $jadwal->deskripsi) }}</textarea>
            </div>
        </div>

        <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
            <h3 style="margin-bottom: 15px; font-size: 1.1rem;">Penugasan Petugas</h3>
            <div id="petugas-container">
                @foreach($jadwal->jemaatPetugas as $index => $petugas)
                <div class="petugas-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                    <select name="petugas[{{ $index }}][jemaat_id]" style="flex: 2; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                        <option value="">-- Pilih Petugas --</option>
                        @foreach($jemaat as $j)
                            <option value="{{ $j->id }}" {{ $petugas->id == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="petugas[{{ $index }}][peran]" value="{{ $petugas->pivot->peran }}" placeholder="Peran" style="flex: 1; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                </div>
                @endforeach
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('jadwal.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-primary">Perbarui Jadwal</button>
        </div>
    </form>
</div>
@endsection
