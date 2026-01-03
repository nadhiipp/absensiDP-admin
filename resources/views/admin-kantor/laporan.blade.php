@extends('layouts.app')

@section('title', 'Laporan - Admin Kantor')

@section('content')
<!-- Page Header -->
<div class="flex justify-between items-start mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-slate-800">Laporan</h1>
        <p class="text-sm text-slate-500 mt-1">Kelola dan unduh laporan kantor</p>
    </div>
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium inline-flex items-center gap-2 transition-all cursor-pointer">
        <i class="bi bi-file-earmark-plus"></i>
        Buat Laporan Baru
    </button>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Laporan</p>
            <p class="text-3xl font-bold text-slate-800">89</p>
        </div>
        <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
            <i class="bi bi-file-earmark-text text-xl"></i>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Bulan Ini</p>
            <p class="text-3xl font-bold text-slate-800">24</p>
        </div>
        <div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center text-green-500">
            <i class="bi bi-calendar-check text-xl"></i>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Sedang Proses</p>
            <p class="text-3xl font-bold text-slate-800">5</p>
        </div>
        <div class="w-11 h-11 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500">
            <i class="bi bi-graph-up-arrow text-xl"></i>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Tahun Ini</p>
            <p class="text-3xl font-bold text-slate-800">312</p>
        </div>
        <div class="w-11 h-11 bg-purple-50 rounded-xl flex items-center justify-center text-purple-500">
            <i class="bi bi-file-earmark-text text-xl"></i>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-6">
    <div class="flex gap-3">
        <button class="px-5 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-all cursor-pointer">
            Semua Tipe
        </button>
        <button class="px-5 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-all cursor-pointer">
            Semua Status
        </button>
        <button class="px-5 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-all cursor-pointer">
            Terbaru
        </button>
    </div>
</div>

<!-- Report List -->
<div class="space-y-3 mb-6">
    @php
        $laporan = [
            ['judul' => 'Laporan Keuangan Q4 2024', 'tipe' => 'Keuangan', 'tanggal' => '15 Desember 2024', 'ukuran' => '2.4 MB', 'status' => 'Selesai'],
            ['judul' => 'Laporan Pegawai Desember 2024', 'tipe' => 'SDM', 'tanggal' => '10 Desember 2024', 'ukuran' => '1.8 MB', 'status' => 'Selesai'],
            ['judul' => 'Laporan Operasional Tahunan', 'tipe' => 'Operasional', 'tanggal' => '20 Desember 2024', 'ukuran' => '-', 'status' => 'Proses'],
            ['judul' => 'Laporan Inventaris Kantor', 'tipe' => 'Aset', 'tanggal' => '8 Desember 2024', 'ukuran' => '3.1 MB', 'status' => 'Selesai'],
        ];
    @endphp

    @foreach($laporan as $l)
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                <i class="bi bi-file-earmark-text text-xl"></i>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-slate-800 mb-1">{{ $l['judul'] }}</h4>
                <div class="flex items-center gap-3 text-xs text-slate-400">
                    <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded font-medium">{{ $l['tipe'] }}</span>
                    <span class="flex items-center gap-1">
                        <i class="bi bi-calendar3"></i>
                        {{ $l['tanggal'] }}
                    </span>
                    <span>{{ $l['ukuran'] }}</span>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            @if($l['status'] == 'Selesai')
                <span class="text-sm font-medium text-green-500">Selesai</span>
                <button class="bg-blue-600 hover: bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium inline-flex items-center gap-2 transition-all cursor-pointer">
                    <i class="bi bi-download"></i>
                    Unduh
                </button>
            @else
                <span class="text-sm font-medium text-yellow-500">Proses</span>
            @endif
        </div>
    </div>
    @endforeach
</div>

<!-- Template Section -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-base font-semibold text-slate-800">Template Laporan</h3>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="border border-slate-200 rounded-xl p-6 text-center hover:border-blue-500 hover:shadow-md transition-all cursor-pointer">
                <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center text-yellow-500">
                    <i class="bi bi-cash-stack text-3xl"></i>
                </div>
                <span class="text-sm font-medium text-slate-700">Laporan Keuangan</span>
            </div>
            <div class="border border-slate-200 rounded-xl p-6 text-center hover:border-blue-500 hover: shadow-md transition-all cursor-pointer">
                <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center text-blue-500">
                    <i class="bi bi-people-fill text-3xl"></i>
                </div>
                <span class="text-sm font-medium text-slate-700">Laporan SDM</span>
            </div>
            <div class="border border-slate-200 rounded-xl p-6 text-center hover:border-blue-500 hover:shadow-md transition-all cursor-pointer">
                <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center text-green-500">
                    <i class="bi bi-graph-up text-3xl"></i>
                </div>
                <span class="text-sm font-medium text-slate-700">Laporan Operasional</span>
            </div>
            <div class="border border-slate-200 rounded-xl p-6 text-center hover:border-blue-500 hover:shadow-md transition-all cursor-pointer">
                <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center text-slate-500">
                    <i class="bi bi-box-seam text-3xl"></i>
                </div>
                <span class="text-sm font-medium text-slate-700">Laporan Aset</span>
            </div>
        </div>
    </div>
</div>
@endsection