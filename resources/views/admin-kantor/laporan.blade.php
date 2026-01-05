@extends('layouts.kantor.app')

@section('title', 'Laporan Absensi - Absensi Kantor')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Laporan Absensi</h1>
    <p class="text-sm text-slate-500 mt-1">Generate dan export laporan kehadiran pegawai</p>
</div>

<!-- Report Type Cards -->
<div class="grid grid-cols-1 md: grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <!-- Laporan Harian -->
    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex justify-between items-start mb-3">
            <p class="text-xs text-slate-500">Laporan Harian</p>
            <div class="w-9 h-9 bg-blue-500 rounded-lg flex items-center justify-center text-white">
                <i class="bi bi-calendar-day text-sm"></i>
            </div>
        </div>
        <h3 class="text-sm font-semibold text-slate-800 mb-4">Rekap Kehadiran Per Hari</h3>
        <button class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all">
            Generate Laporan
        </button>
    </div>

    <!-- Laporan Mingguan -->
    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex justify-between items-start mb-3">
            <p class="text-xs text-slate-500">Laporan Mingguan</p>
            <div class="w-9 h-9 bg-blue-500 rounded-lg flex items-center justify-center text-white">
                <i class="bi bi-calendar-week text-sm"></i>
            </div>
        </div>
        <h3 class="text-sm font-semibold text-slate-800 mb-4">Rekap Kehadiran Per Minggu</h3>
        <button class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all">
            Generate Laporan
        </button>
    </div>

    <!-- Laporan Bulanan -->
    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex justify-between items-start mb-3">
            <p class="text-xs text-slate-500">Laporan Bulanan</p>
            <div class="w-9 h-9 bg-blue-500 rounded-lg flex items-center justify-center text-white">
                <i class="bi bi-calendar-month text-sm"></i>
            </div>
        </div>
        <h3 class="text-sm font-semibold text-slate-800 mb-4">Rekap Kehadiran Per Bulan</h3>
        <button class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all">
            Generate Laporan
        </button>
    </div>

    <!-- Laporan Custom -->
    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex justify-between items-start mb-3">
            <p class="text-xs text-slate-500">Laporan Custom</p>
            <div class="w-9 h-9 bg-blue-500 rounded-lg flex items-center justify-center text-white">
                <i class="bi bi-gear text-sm"></i>
            </div>
        </div>
        <h3 class="text-sm font-semibold text-slate-800 mb-4">Pilih Rentang Tanggal</h3>
        <button class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all">
            Generate Laporan
        </button>
    </div>
</div>

<!-- Generate Custom Report -->
<div class="bg-white border border-slate-200 rounded-xl p-6 mb-6">
    <h3 class="text-base font-semibold text-slate-800 mb-5">Generate Laporan Custom</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Laporan</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500">
                <option>Laporan Kehadiran</option>
                <option>Laporan Keterlambatan</option>
                <option>Laporan Izin/Sakit</option>
                <option>Laporan Per Shift</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Mulai</label>
            <div class="relative">
                <input type="date" value="2025-12-01" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Akhir</label>
            <div class="relative">
                <input type="date" value="2025-12-25" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Departemen</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500">
                <option>Semua Departemen</option>
                <option>Produksi</option>
                <option>Quality Control</option>
                <option>Warehouse</option>
                <option>HRD</option>
                <option>Maintenance</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Shift</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-blue-500">
                <option>Semua Shift</option>
                <option>Pagi</option>
                <option>Siang</option>
                <option>Malam</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Format Export</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-blue-500">
                <option>PDF</option>
                <option>Excel</option>
                <option>CSV</option>
            </select>
        </div>
    </div>

    <div class="flex justify-end gap-3">
        <button class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
            <i class="bi bi-arrow-counterclockwise"></i>
            Reset
        </button>
        <button class="px-5 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all inline-flex items-center gap-2">
            <i class="bi bi-download"></i>
            Generate & Download Laporan
        </button>
    </div>
</div>

<!-- Riwayat Laporan -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-base font-semibold text-slate-800">Riwayat Laporan</h3>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Tanggal Generate</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Jenis Laporan</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Periode</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Departemen</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Format</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @php
                    $riwayat = [
                        ['tanggal' => '25 Des 2025, 10:30', 'jenis' => 'Laporan Kehadiran', 'periode' => '1-25 Des 2025', 'dept' => 'Semua Departemen', 'format' => 'PDF', 'status' => 'Selesai'],
                        ['tanggal' => '24 Des 2025, 14:15', 'jenis' => 'Laporan Keterlambatan', 'periode' => 'Des 2025', 'dept' => 'Produksi', 'format' => 'Excel', 'status' => 'Selesai'],
                        ['tanggal' => '23 Des 2025, 09:45', 'jenis' => 'Laporan Per Departemen', 'periode' => 'Nov 2025', 'dept' => 'Quality Control', 'format' => 'PDF', 'status' => 'Selesai'],
                        ['tanggal' => '22 Des 2025, 16:20', 'jenis' => 'Laporan Izin/Sakit', 'periode' => '1-22 Des 2025', 'dept' => 'Semua Departemen', 'format' => 'CSV', 'status' => 'Selesai'],
                        ['tanggal' => '20 Des 2025, 11:00', 'jenis' => 'Laporan Per Shift', 'periode' => 'Des 2025', 'dept' => 'Warehouse', 'format' => 'Excel', 'status' => 'Selesai'],
                    ];
                @endphp

                @foreach($riwayat as $r)
                <tr class="hover:bg-slate-50 transition-all">
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $r['tanggal'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-800">{{ $r['jenis'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $r['periode'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $r['dept'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $r['format'] }}</td>
                    <td class="px-5 py-4">
                        <span class="px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">{{ $r['status'] }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <button class="text-sm text-slate-500 hover:text-blue-600 font-medium inline-flex items-center gap-1">
                            <i class="bi bi-download"></i>
                            Download
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection