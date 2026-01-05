@extends('layouts.kantor.app')

@section('title', 'Data Pegawai - Absensi Kantor')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Data Pegawai</h1>
    <p class="text-sm text-slate-500 mt-1">Manajemen data seluruh pegawai kantor</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Pegawai</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">342</p>
            <p class="text-xs font-medium text-blue-500">+5% dari bulan lalu</p>
        </div>
        <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
            <i class="bi bi-people-fill text-xl"></i>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Pegawai Aktif</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">335</p>
            <p class="text-xs font-medium text-blue-500">98% aktif</p>
        </div>
        <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-blue-500">
            <i class="bi bi-check-circle-fill text-xl"></i>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Pegawai Baru</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">24</p>
            <p class="text-xs font-medium text-blue-500">Bulan Des 2025</p>
        </div>
        <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-blue-500">
            <i class="bi bi-person-plus-fill text-xl"></i>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Keluar/Pensiun</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">7</p>
            <p class="text-xs font-medium text-slate-500">Bulan ini</p>
        </div>
        <div class="w-11 h-11 bg-red-100 rounded-xl flex items-center justify-center text-red-500">
            <i class="bi bi-person-x-fill text-xl"></i>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
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
            <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-blue-500">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Cuti</option>
                <option>Nonaktif</option>
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
        <div class="flex items-end">
            <button class="w-full px-4 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all inline-flex items-center justify-center gap-2">
                <i class="bi bi-search"></i>
                Terapkan Filter
            </button>
        </div>
    </div>
</div>

<!-- Table -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center">
        <h3 class="text-base font-semibold text-slate-800">Daftar Pegawai</h3>
        <div class="flex gap-3">
            <button class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
                <i class="bi bi-printer"></i>
                Cetak
            </button>
            <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all inline-flex items-center gap-2">
                <i class="bi bi-plus-lg"></i>
                Tambah Pegawai
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
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Jabatan</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Shift</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Tanggal Masuk</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-left px-14 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @php
                    $pegawai = [
                        ['nip' => 'PB001', 'nama' => 'Budi Santoso', 'dept' => 'Produksi', 'jabatan' => 'Operator Mesin', 'shift' => 'Pagi', 'tgl_masuk' => '15 Jan 2020', 'status' => 'Aktif'],
                        ['nip' => 'PB002', 'nama' => 'Siti Aminah', 'dept' => 'Quality Control', 'jabatan' => 'QC Inspector', 'shift' => 'Pagi', 'tgl_masuk' => '20 Mar 2021', 'status' => 'Aktif'],
                        ['nip' => 'PB003', 'nama' => 'Ahmad Wijaya', 'dept' => 'Warehouse', 'jabatan' => 'Store Keeper', 'shift' => 'Siang', 'tgl_masuk' => '10 Mei 2019', 'status' => 'Aktif'],
                        ['nip' => 'PB004', 'nama' => 'Dewi Lestari', 'dept' => 'HRD', 'jabatan' => 'HR Staff', 'shift' => 'Pagi', 'tgl_masuk' => '05 Ags 2022', 'status' => 'Aktif'],
                        ['nip' => 'PB005', 'nama' => 'Rizki Pratama', 'dept' => 'Maintenance', 'jabatan' => 'Teknisi', 'shift' => 'Malam', 'tgl_masuk' => '30 Nov 2020', 'status' => 'Aktif'],
                        ['nip' => 'PB006', 'nama' => 'Lina Marlina', 'dept' => 'Produksi', 'jabatan' => 'Supervisor', 'shift' => 'Siang', 'tgl_masuk' => '12 Feb 2018', 'status' => 'Aktif'],
                        ['nip' => 'PB007', 'nama' => 'Eko Saputra', 'dept' => 'Quality Control', 'jabatan' => 'QC Supervisor', 'shift' => 'Pagi', 'tgl_masuk' => '18 Jun 2019', 'status' => 'Aktif'],
                        ['nip' => 'PB008', 'nama' => 'Rina Wati', 'dept' => 'Warehouse', 'jabatan' => 'Admin Gudang', 'shift' => 'Pagi', 'tgl_masuk' => '25 Sep 2021', 'status' => 'Aktif'],
                        ['nip' => 'PB009', 'nama' => 'Hadi Kusuma', 'dept' => 'Produksi', 'jabatan' => 'Operator Mesin', 'shift' => 'Malam', 'tgl_masuk' => '14 Apr 2022', 'status' => 'Cuti'],
                        ['nip' => 'PB010', 'nama' => 'Maya Sari', 'dept' => 'HRD', 'jabatan' => 'HR Manager', 'shift' => 'Pagi', 'tgl_masuk' => '03 Jan 2017', 'status' => 'Aktif'],
                    ];
                @endphp

                @foreach($pegawai as $p)
                <tr class="hover: bg-slate-50 transition-all">
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['nip'] }}</td>
                    <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $p['nama'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['dept'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['jabatan'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['shift'] }}</td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['tgl_masuk'] }}</td>
                    <td class="px-5 py-4">
                        @if($p['status'] == 'Aktif')
                            <span class="px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Aktif</span>
                        @elseif($p['status'] == 'Cuti')
                            <span class="px-2.5 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Cuti</span>
                        @else
                            <span class="px-2.5 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-1">
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all cursor-pointer">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all cursor-pointer">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-red-50 hover: text-red-500 transition-all cursor-pointer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection