@extends('layouts.app')

@section('title', 'Dashboard - Admin Kantor')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Dashboard</h1>
    <p class="text-sm text-slate-500 mt-1">Ringkasan data dan statistik kantor</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <!-- Total Kantor -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Kantor</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">124</p>
            <p class="text-xs font-medium text-green-500">+12% dari bulan lalu</p>
        </div>
        <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
            <i class="bi bi-building text-xl"></i>
        </div>
    </div>

    <!-- Total Pegawai -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Pegawai</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">1,840</p>
            <p class="text-xs font-medium text-green-500">+8% dari bulan lalu</p>
        </div>
        <div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center text-green-500">
            <i class="bi bi-people text-xl"></i>
        </div>
    </div>

    <!-- Pertumbuhan -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Pertumbuhan</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">24%</p>
            <p class="text-xs font-medium text-green-500">+3% dari bulan lalu</p>
        </div>
        <div class="w-11 h-11 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500">
            <i class="bi bi-graph-up-arrow text-xl"></i>
        </div>
    </div>

    <!-- Laporan Bulan Ini -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Laporan Bulan Ini</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">89</p>
            <p class="text-xs font-medium text-green-500">+15% dari bulan lalu</p>
        </div>
        <div class="w-11 h-11 bg-purple-50 rounded-xl flex items-center justify-center text-purple-500">
            <i class="bi bi-file-earmark-text text-xl"></i>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Line Chart -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-200">
            <h3 class="text-base font-semibold text-slate-800">Pertumbuhan Kantor & Pegawai</h3>
        </div>
        <div class="p-5">
            <div class="h-52 flex flex-col items-center justify-center text-slate-300">
                <i class="bi bi-bar-chart-line text-5xl mb-3"></i>
                <span class="text-sm">Grafik Line Chart</span>
            </div>
        </div>
    </div>

    <!-- Bar Chart -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-200">
            <h3 class="text-base font-semibold text-slate-800">Distribusi Tipe Kantor</h3>
        </div>
        <div class="p-5">
            <div class="h-52 flex flex-col items-center justify-center text-slate-300">
                <i class="bi bi-bar-chart text-5xl mb-3"></i>
                <span class="text-sm">Grafik Bar Chart</span>
            </div>
        </div>
    </div>
</div>

<!-- Activity Section -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-base font-semibold text-slate-800">Aktivitas Terbaru</h3>
    </div>
    <div class="p-5">
        <!-- Activity Item 1 -->
        <div class="flex items-start gap-4 py-4 border-b border-slate-100">
            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                AW
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Ahmad Wijaya</span> Menambahkan kantor baru
                </p>
                <p class="text-xs text-slate-400 mt-1">Jakarta Pusat</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">2 jam yang lalu</span>
        </div>

        <!-- Activity Item 2 -->
        <div class="flex items-start gap-4 py-4 border-b border-slate-100">
            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                SN
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Siti Nurhaliza</span> Memperbarui data pegawai
                </p>
                <p class="text-xs text-slate-400 mt-1">Surabaya</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">4 jam yang lalu</span>
        </div>

        <!-- Activity Item 3 -->
        <div class="flex items-start gap-4 py-4 border-b border-slate-100">
            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                BS
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Budi Santoso</span> Menghapus kantor cabang
                </p>
                <p class="text-xs text-slate-400 mt-1">Bandung</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">6 jam yang lalu</span>
        </div>

        <!-- Activity Item 4 -->
        <div class="flex items-start gap-4 py-4">
            <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                DL
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Dewi Lestari</span> Membuat laporan bulanan
                </p>
                <p class="text-xs text-slate-400 mt-1">Yogyakarta</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">8 jam yang lalu</span>
        </div>
    </div>
</div>
@endsection