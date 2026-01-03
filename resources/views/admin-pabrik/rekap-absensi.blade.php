@extends('layouts.pabrik.app')

@section('title', 'Rekap Absensi - Absensi Pabrik')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Rekap Absensi</h1>
    <p class="text-sm text-slate-500 mt-1">Laporan kehadiran pegawai per bulan</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <!-- Rata-rata Kehadiran -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Rata-rata Kehadiran</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">94. 2%</p>
            <p class="text-xs font-medium text-emerald-500">Bulan Desember 2025</p>
        </div>
        <div class="w-11 h-11 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-500">
            <i class="bi bi-graph-up-arrow text-xl"></i>
        </div>
    </div>

    <!-- Total Hari Kerja -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Hari Kerja</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">22</p>
            <p class="text-xs font-medium text-slate-500">Hari kerja efektif</p>
        </div>
        <div class="w-11 h-11 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600">
            <i class="bi bi-calendar-check-fill text-xl"></i>
        </div>
    </div>

    <!-- Total Keterlambatan -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Keterlambatan</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">142</p>
            <p class="text-xs font-medium text-amber-500">Kasus keterlambatan</p>
        </div>
        <div class="w-11 h-11 bg-amber-100 rounded-xl flex items-center justify-center text-amber-500">
            <i class="bi bi-clock-history text-xl"></i>
        </div>
    </div>

    <!-- Total Izin/Sakit -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Izin/Sakit</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">267</p>
            <p class="text-xs font-medium text-slate-500">Izin:  156 | Sakit: 111</p>
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
            <label class="block text-sm font-medium text-slate-700 mb-2">Bulan</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-emerald-500">
                <option>Desember 2025</option>
                <option>November 2025</option>
                <option>Oktober 2025</option>
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
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Shift</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-emerald-500">
                <option>Semua Shift</option>
                <option>Pagi</option>
                <option>Siang</option>
                <option>Malam</option>
            </select>
        </div>
        <div class="flex items-end">
            <button class="w-full px-4 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-sm font-medium transition-all inline-flex items-center justify-center gap-2">
                <i class="bi bi-search"></i>
                Tampilkan Data
            </button>
        </div>
    </div>
</div>

<!-- Table Section -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center">
        <h3 class="text-base font-semibold text-slate-800">Rekap Kehadiran Pegawai - Desember 2025</h3>
        <div class="flex gap-3">
            <button class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
                <i class="bi bi-printer"></i>
                Cetak PDF
            </button>
            <button class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-sm font-medium transition-all inline-flex items-center gap-2">
                <i class="bi bi-file-earmark-excel"></i>
                Export Excel
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">NIP</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Nama Pegawai</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Departemen</th>
                    <th class="text-center px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Hadir</th>
                    <th class="text-center px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Terlambat</th>
                    <th class="text-center px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Izin</th>
                    <th class="text-center px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Sakit</th>
                    <th class="text-center px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Alpha</th>
                    <th class="text-center px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Total Hari</th>
                    <th class="text-center px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Persentase</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @php
                    $rekap = [
                        ['nip' => 'PB001', 'nama' => 'Budi Santoso', 'dept' => 'Produksi', 'hadir' => 21, 'terlambat' => 1, 'izin' => 0, 'sakit' => 0, 'alpha' => 0, 'total' => 22, 'persen' => '95.5%'],
                        ['nip' => 'PB002', 'nama' => 'Siti Aminah', 'dept' => 'Quality Control', 'hadir' => 22, 'terlambat' => 0, 'izin' => 0, 'sakit' => 0, 'alpha' => 0, 'total' => 22, 'persen' => '100%'],
                        ['nip' => 'PB003', 'nama' => 'Ahmad Wijaya', 'dept' => 'Warehouse', 'hadir' => 19, 'terlambat' => 2, 'izin' => 1, 'sakit' => 0, 'alpha' => 0, 'total' => 22, 'persen' => '86.4%'],
                        ['nip' => 'PB004', 'nama' => 'Dewi Lestari', 'dept' => 'HRD', 'hadir' => 21, 'terlambat' => 0, 'izin' => 1, 'sakit' => 0, 'alpha' => 0, 'total' => 22, 'persen' => '95.5%'],
                        ['nip' => 'PB005', 'nama' => 'Rizki Pratama', 'dept' => 'Maintenance', 'hadir' => 20, 'terlambat' => 1, 'izin' => 0, 'sakit' => 1, 'alpha' => 0, 'total' => 22, 'persen' => '90.9%'],
                        ['nip' => 'PB006', 'nama' => 'Lina Marlina', 'dept' => 'Produksi', 'hadir' => 22, 'terlambat' => 0, 'izin' => 0, 'sakit' => 0, 'alpha' => 0, 'total' => 22, 'persen' => '100%'],
                        ['nip' => 'PB007', 'nama' => 'Eko Saputra', 'dept' => 'Quality Control', 'hadir' => 18, 'terlambat' => 1, 'izin' => 2, 'sakit' => 1, 'alpha' => 0, 'total' => 22, 'persen' => '81.8%'],
                        ['nip' => 'PB008', 'nama' => 'Rina Wati', 'dept' => 'Warehouse', 'hadir' => 21, 'terlambat' => 1, 'izin' => 0, 'sakit' => 0, 'alpha' => 0, 'total' => 22, 'persen' => '95.5%'],
                        ['nip' => 'PB009', 'nama' => 'Hadi Kusuma', 'dept' => 'Produksi', 'hadir' => 19, 'terlambat' => 2, 'izin' => 0, 'sakit' => 1, 'alpha' => 0, 'total' => 22, 'persen' => '86.4%'],
                        ['nip' => 'PB010', 'nama' => 'Maya Sari', 'dept' => 'HRD', 'hadir' => 22, 'terlambat' => 0, 'izin' => 0, 'sakit' => 0, 'alpha' => 0, 'total' => 22, 'persen' => '100%'],
                    ];
                @endphp

                @foreach($rekap as $r)
                <tr class="hover: bg-slate-50 transition-all">
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $r['nip'] }}</td>
                    <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $r['nama'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $r['dept'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600 text-center">{{ $r['hadir'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600 text-center">{{ $r['terlambat'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600 text-center">{{ $r['izin'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600 text-center">{{ $r['sakit'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600 text-center">{{ $r['alpha'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600 text-center">{{ $r['total'] }}</td>
                    <td class="px-5 py-4 text-center">
                        @php
                            $persenNum = floatval(str_replace('%', '', $r['persen']));
                        @endphp
                        <span class="text-sm font-medium {{ $persenNum >= 95 ? 'text-emerald-500' : ($persenNum >= 85 ? 'text-amber-500' : 'text-red-500') }}">
                            {{ $r['persen'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection