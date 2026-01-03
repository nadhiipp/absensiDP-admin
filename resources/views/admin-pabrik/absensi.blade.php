@extends('layouts.pabrik.app')

@section('title', 'Absensi Hari Ini - Absensi Pabrik')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Absensi Hari Ini</h1>
    <p class="text-sm text-slate-500 mt-1">Data kehadiran pegawai secara realtime - Rabu, 25 Desember 2025</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <!-- Sudah Absen -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Sudah Absen</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">324</p>
            <p class="text-xs font-medium text-emerald-500">94.7% dari total</p>
        </div>
        <div class="w-11 h-11 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-500">
            <i class="bi bi-check-circle-fill text-xl"></i>
        </div>
    </div>

    <!-- Belum Absen -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Belum Absen</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">18</p>
            <p class="text-xs font-medium text-amber-500">5. 3% dari total</p>
        </div>
        <div class="w-11 h-11 bg-amber-100 rounded-xl flex items-center justify-center text-amber-500">
            <i class="bi bi-clock-fill text-xl"></i>
        </div>
    </div>

    <!-- Terlambat -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Terlambat</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">6</p>
            <p class="text-xs font-medium text-red-500">1.75% terlambat</p>
        </div>
        <div class="w-11 h-11 bg-red-100 rounded-xl flex items-center justify-center text-red-500">
            <i class="bi bi-exclamation-circle-fill text-xl"></i>
        </div>
    </div>

    <!-- Izin/Sakit -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Izin/Sakit</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">12</p>
            <p class="text-xs font-medium text-slate-500">Izin: 8 | Sakit: 4</p>
        </div>
        <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-blue-500">
            <i class="bi bi-calendar-x-fill text-xl"></i>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-emerald-500">
                <option>Semua Status</option>
                <option>Hadir</option>
                <option>Terlambat</option>
                <option>Izin</option>
                <option>Sakit</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Shift</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-emerald-500">
                <option>Semua Shift</option>
                <option>Pagi</option>
                <option>Siang</option>
                <option>Malam</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Departemen</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-emerald-500">
                <option>Semua Departemen</option>
                <option>Produksi</option>
                <option>Quality Control</option>
                <option>Warehouse</option>
                <option>HRD</option>
                <option>Maintenance</option>
            </select>
        </div>
        <div class="flex items-end">
            <button class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center justify-center gap-2">
                <i class="bi bi-arrow-counterclockwise"></i>
                Reset Filter
            </button>
        </div>
    </div>
</div>

<!-- Table Section -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center">
        <h3 class="text-base font-semibold text-slate-800">Daftar Absensi Hari Ini</h3>
        <div class="flex gap-3">
            <button class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
                <i class="bi bi-printer"></i>
                Cetak
            </button>
            <button class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-sm font-medium transition-all inline-flex items-center gap-2">
                <i class="bi bi-plus-lg"></i>
                Tambah Absen Manual
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">No</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">NIP</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Nama Pegawai</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Departemen</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Shift</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Jam Masuk</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Jam Keluar</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Keterangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @php
                    $absensi = [
                        ['no' => 1, 'nip' => 'PB001', 'nama' => 'Budi Santoso', 'dept' => 'Produksi', 'shift' => 'Pagi', 'masuk' => '06:58', 'keluar' => '-', 'status' => 'Hadir', 'ket' => 'Tepat waktu'],
                        ['no' => 2, 'nip' => 'PB002', 'nama' => 'Siti Aminah', 'dept' => 'Quality Control', 'shift' => 'Pagi', 'masuk' => '07:00', 'keluar' => '-', 'status' => 'Hadir', 'ket' => 'Tepat waktu'],
                        ['no' => 3, 'nip' => 'PB003', 'nama' => 'Ahmad Wijaya', 'dept' => 'Warehouse', 'shift' => 'Pagi', 'masuk' => '07:15', 'keluar' => '-', 'status' => 'Terlambat', 'ket' => 'Terlambat 15 menit'],
                        ['no' => 4, 'nip' => 'PB004', 'nama' => 'Dewi Lestari', 'dept' => 'HRD', 'shift' => 'Pagi', 'masuk' => '06:55', 'keluar' => '-', 'status' => 'Hadir', 'ket' => 'Tepat waktu'],
                        ['no' => 5, 'nip' => 'PB005', 'nama' => 'Rizki Pratama', 'dept' => 'Maintenance', 'shift' => 'Pagi', 'masuk' => '-', 'keluar' => '-', 'status' => 'Izin', 'ket' => 'Izin urusan keluarga'],
                        ['no' => 6, 'nip' => 'PB006', 'nama' => 'Lina Marlina', 'dept' => 'Produksi', 'shift' => 'Pagi', 'masuk' => '06:50', 'keluar' => '-', 'status' => 'Hadir', 'ket' => 'Tepat waktu'],
                        ['no' => 7, 'nip' => 'PB007', 'nama' => 'Eko Saputra', 'dept' => 'Quality Control', 'shift' => 'Pagi', 'masuk' => '-', 'keluar' => '-', 'status' => 'Sakit', 'ket' => 'Sakit demam, ada surat'],
                        ['no' => 8, 'nip' => 'PB008', 'nama' => 'Rina Wati', 'dept' => 'Warehouse', 'shift' => 'Pagi', 'masuk' => '07:02', 'keluar' => '-', 'status' => 'Hadir', 'ket' => 'Tepat waktu'],
                        ['no' => 9, 'nip' => 'PB009', 'nama' => 'Hadi Kusuma', 'dept' => 'Produksi', 'shift' => 'Pagi', 'masuk' => '07:20', 'keluar' => '-', 'status' => 'Terlambat', 'ket' => 'Terlambat 20 menit'],
                        ['no' => 10, 'nip' => 'PB010', 'nama' => 'Maya Sari', 'dept' => 'HRD', 'shift' => 'Pagi', 'masuk' => '06:58', 'keluar' => '-', 'status' => 'Hadir', 'ket' => 'Tepat waktu'],
                    ];
                @endphp

                @foreach($absensi as $a)
                <tr class="hover: bg-slate-50 transition-all">
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $a['no'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $a['nip'] }}</td>
                    <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $a['nama'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $a['dept'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $a['shift'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $a['masuk'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $a['keluar'] }}</td>
                    <td class="px-5 py-4">
                        @if($a['status'] == 'Hadir')
                            <span class="px-2. 5 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">Hadir</span>
                        @elseif($a['status'] == 'Terlambat')
                            <span class="px-2.5 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Terlambat</span>
                        @elseif($a['status'] == 'Izin')
                            <span class="px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Izin</span>
                        @elseif($a['status'] == 'Sakit')
                            <span class="px-2.5 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">Sakit</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-500">{{ $a['ket'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection