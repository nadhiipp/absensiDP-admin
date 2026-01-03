@extends('layouts.app')

@section('title', 'Data Pegawai - Admin Kantor')

@section('content')
<!-- Page Header -->
<div class="flex justify-between items-start mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-slate-800">Data Pegawai</h1>
        <p class="text-sm text-slate-500 mt-1">Kelola informasi pegawai kantor</p>
    </div>
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium inline-flex items-center gap-2 transition-all cursor-pointer">
        <i class="bi bi-plus-lg"></i>
        Tambah Pegawai
    </button>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Pegawai</p>
            <p class="text-3xl font-bold text-slate-800">1,840</p>
        </div>
        <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
            <i class="bi bi-people text-xl"></i>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Pegawai Aktif</p>
            <p class="text-3xl font-bold text-slate-800">1,795</p>
        </div>
        <div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center text-green-500">
            <i class="bi bi-check-circle text-xl"></i>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Pegawai Cuti</p>
            <p class="text-3xl font-bold text-slate-800">45</p>
        </div>
        <div class="w-11 h-11 bg-purple-50 rounded-xl flex items-center justify-center text-purple-500">
            <i class="bi bi-calendar-x text-xl"></i>
        </div>
    </div>
</div>

<!-- Search and Filter -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-6">
    <div class="flex flex-col lg:flex-row gap-4 justify-between items-center">
        <div class="relative flex-1 w-full">
            <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input type="text" 
                   placeholder="Cari pegawai..." 
                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus: ring-2 focus:ring-blue-100">
        </div>
        <div class="flex gap-3">
            <button class="px-5 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-all cursor-pointer">
                Semua Jabatan
            </button>
            <button class="px-5 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-all cursor-pointer">
                Semua Status
            </button>
        </div>
    </div>
</div>

<!-- Table -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Pegawai</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">NIP</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Jabatan</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Kantor</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Kontak</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @php
                    $pegawai = [
                        ['nama' => 'Ahmad Wijaya', 'inisial' => 'AW', 'warna' => 'bg-blue-600', 'nip' => '198501152010011001', 'jabatan' => 'Manajer', 'jabatan_warna' => 'bg-blue-100 text-blue-700', 'kantor' => 'Kantor Pusat Jakarta', 'email' => 'ahmad.wijaya@kantor.com', 'telp' => '081234567890', 'status' => 'Aktif', 'status_warna' => 'text-green-500'],
                        ['nama' => 'Siti Nurhaliza', 'inisial' => 'SN', 'warna' => 'bg-green-500', 'nip' => '199002202012012002', 'jabatan' => 'Staff', 'jabatan_warna' => 'bg-green-100 text-green-700', 'kantor' => 'Kantor Cabang Surabaya', 'email' => 'siti.n@kantor.com', 'telp' => '082345678901', 'status' => 'Aktif', 'status_warna' => 'text-green-500'],
                        ['nama' => 'Budi Santoso', 'inisial' => 'BS', 'warna' => 'bg-orange-500', 'nip' => '198705102008011003', 'jabatan' => 'Supervisor', 'jabatan_warna' => 'bg-yellow-100 text-yellow-700', 'kantor' => 'Kantor Regional Bandung', 'email' => 'budi.s@kantor.com', 'telp' => '083456789012', 'status' => 'Aktif', 'status_warna' => 'text-green-500'],
                        ['nama' => 'Dewi Lestari', 'inisial' => 'DL', 'warna' => 'bg-purple-500', 'nip' => '199108252013012004', 'jabatan' => 'Staff', 'jabatan_warna' => 'bg-green-100 text-green-700', 'kantor' => 'Kantor Perwakilan Yogyakarta', 'email' => 'dewi.l@kantor.com', 'telp' => '084567890123', 'status' => 'Aktif', 'status_warna' => 'text-green-500'],
                        ['nama' => 'Eko Prasetyo', 'inisial' => 'EP', 'warna' => 'bg-cyan-500', 'nip' => '198903152009011005', 'jabatan' => 'Manajer', 'jabatan_warna' => 'bg-blue-100 text-blue-700', 'kantor' => 'Kantor Cabang Medan', 'email' => 'eko.p@kantor.com', 'telp' => '085678901234', 'status' => 'Cuti', 'status_warna' => 'text-yellow-500'],
                    ];
                @endphp

                @foreach($pegawai as $p)
                <tr class="hover: bg-slate-50 transition-all">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 {{ $p['warna'] }} rounded-full flex items-center justify-center text-white text-xs font-semibold">
                                {{ $p['inisial'] }}
                            </div>
                            <span class="font-medium text-slate-800">{{ $p['nama'] }}</span>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['nip'] }}</td>
                    <td class="px-5 py-4">
                        <span class="px-3 py-1 {{ $p['jabatan_warna'] }} text-xs font-medium rounded-md">{{ $p['jabatan'] }}</span>
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-600">{{ $p['kantor'] }}</td>
                    <td class="px-5 py-4">
                        <div class="text-sm">
                            <div class="flex items-center gap-2 text-slate-600">
                                <i class="bi bi-envelope text-slate-400 text-xs"></i>
                                {{ $p['email'] }}
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 mt-1">
                                <i class="bi bi-telephone text-slate-400 text-xs"></i>
                                {{ $p['telp'] }}
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-medium {{ $p['status_warna'] }}">{{ $p['status'] }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-1">
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover: bg-slate-100 hover:text-slate-600 transition-all cursor-pointer">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all cursor-pointer">
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