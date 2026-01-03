@extends('layouts.pabrik.app')

@section('title', 'Shift Kerja - Absensi Pabrik')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Pengaturan Shift Kerja</h1>
    <p class="text-sm text-slate-500 mt-1">Manajemen jadwal shift dan penugasan pegawai</p>
</div>

<!-- Shift Cards -->
<div class="grid grid-cols-1 md: grid-cols-3 gap-5 mb-6">
    <!-- Shift Pagi -->
    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-base font-semibold text-slate-800">Shift Pagi</h3>
            <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center text-white">
                <i class="bi bi-sun-fill text-lg"></i>
            </div>
        </div>
        <div class="space-y-3">
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Jam Kerja</span>
                <span class="text-sm font-semibold text-slate-800">07:00 - 15:00</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Durasi</span>
                <span class="text-sm font-semibold text-slate-800">8 Jam</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Total Pegawai</span>
                <span class="text-sm font-semibold text-slate-800">158 Orang</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Status</span>
                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">Aktif</span>
            </div>
        </div>
    </div>

    <!-- Shift Siang -->
    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-base font-semibold text-slate-800">Shift Siang</h3>
            <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center text-white">
                <i class="bi bi-brightness-high-fill text-lg"></i>
            </div>
        </div>
        <div class="space-y-3">
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Jam Kerja</span>
                <span class="text-sm font-semibold text-slate-800">15:00 - 23:00</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Durasi</span>
                <span class="text-sm font-semibold text-slate-800">8 Jam</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Total Pegawai</span>
                <span class="text-sm font-semibold text-slate-800">112 Orang</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Status</span>
                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">Aktif</span>
            </div>
        </div>
    </div>

    <!-- Shift Malam -->
    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-base font-semibold text-slate-800">Shift Malam</h3>
            <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center text-white">
                <i class="bi bi-moon-fill text-lg"></i>
            </div>
        </div>
        <div class="space-y-3">
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Jam Kerja</span>
                <span class="text-sm font-semibold text-slate-800">23:00 - 07:00</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Durasi</span>
                <span class="text-sm font-semibold text-slate-800">8 Jam</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Total Pegawai</span>
                <span class="text-sm font-semibold text-slate-800">72 Orang</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-slate-500">Status</span>
                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">Aktif</span>
            </div>
        </div>
    </div>
</div>

<!-- Penugasan Shift Pegawai -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center">
        <h3 class="text-base font-semibold text-slate-800">Penugasan Shift Pegawai</h3>
        <div class="flex gap-3">
            <button class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
                <i class="bi bi-download"></i>
                Export Excel
            </button>
            <button class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-sm font-medium transition-all inline-flex items-center gap-2">
                <i class="bi bi-plus-lg"></i>
                Tambah Penugasan
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="px-5 py-4 border-b border-slate-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Shift</label>
                <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-emerald-500">
                    <option>Semua Shift</option>
                    <option>Shift Pagi</option>
                    <option>Shift Siang</option>
                    <option>Shift Malam</option>
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
                <button class="w-full px-4 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-sm font-medium transition-all">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">NIP</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Nama Pegawai</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Departemen</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Shift Saat Ini</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Jam Kerja</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Mulai Berlaku</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @php
                    $penugasan = [
                        ['nip' => 'PB001', 'nama' => 'Budi Santoso', 'dept' => 'Produksi', 'shift' => 'Shift Pagi', 'shift_color' => 'bg-amber-100 text-amber-700', 'jam' => '07:00 - 15:00', 'mulai' => '1 Jan 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB002', 'nama' => 'Siti Aminah', 'dept' => 'Quality Control', 'shift' => 'Shift Pagi', 'shift_color' => 'bg-amber-100 text-amber-700', 'jam' => '07:00 - 15:00', 'mulai' => '1 Jan 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB003', 'nama' => 'Ahmad Wijaya', 'dept' => 'Warehouse', 'shift' => 'Shift Siang', 'shift_color' => 'bg-orange-100 text-orange-700', 'jam' => '15:00 - 23:00', 'mulai' => '15 Nov 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB004', 'nama' => 'Dewi Lestari', 'dept' => 'HRD', 'shift' => 'Shift Pagi', 'shift_color' => 'bg-amber-100 text-amber-700', 'jam' => '07:00 - 15:00', 'mulai' => '1 Jan 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB005', 'nama' => 'Rizki Pratama', 'dept' => 'Maintenance', 'shift' => 'Shift Malam', 'shift_color' => 'bg-indigo-100 text-indigo-700', 'jam' => '23:00 - 07:00', 'mulai' => '1 Okt 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB006', 'nama' => 'Lina Marlina', 'dept' => 'Produksi', 'shift' => 'Shift Siang', 'shift_color' => 'bg-orange-100 text-orange-700', 'jam' => '15:00 - 23:00', 'mulai' => '1 Des 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB007', 'nama' => 'Eko Saputra', 'dept' => 'Quality Control', 'shift' => 'Shift Pagi', 'shift_color' => 'bg-amber-100 text-amber-700', 'jam' => '07:00 - 15:00', 'mulai' => '1 Jan 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB008', 'nama' => 'Rina Wati', 'dept' => 'Warehouse', 'shift' => 'Shift Pagi', 'shift_color' => 'bg-amber-100 text-amber-700', 'jam' => '07:00 - 15:00', 'mulai' => '1 Jan 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB009', 'nama' => 'Hadi Kusuma', 'dept' => 'Produksi', 'shift' => 'Shift Malam', 'shift_color' => 'bg-indigo-100 text-indigo-700', 'jam' => '23:00 - 07:00', 'mulai' => '20 Nov 2025', 'status' => 'Aktif'],
                        ['nip' => 'PB010', 'nama' => 'Maya Sari', 'dept' => 'HRD', 'shift' => 'Shift Pagi', 'shift_color' => 'bg-amber-100 text-amber-700', 'jam' => '07:00 - 15:00', 'mulai' => '1 Jan 2025', 'status' => 'Aktif'],
                    ];
                @endphp

                @foreach($penugasan as $p)
                <tr class="hover: bg-slate-50 transition-all">
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['nip'] }}</td>
                    <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $p['nama'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['dept'] }}</td>
                    <td class="px-5 py-4">
                        <span class="px-2.5 py-1 {{ $p['shift_color'] }} text-xs font-medium rounded-full">{{ $p['shift'] }}</span>
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['jam'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['mulai'] }}</td>
                    <td class="px-5 py-4">
                        <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">{{ $p['status'] }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <button class="text-sm text-slate-500 hover: text-emerald-600 font-medium">Ubah Shift</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection