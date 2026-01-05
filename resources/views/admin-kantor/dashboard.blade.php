@extends('layouts.kantor.app')

@section('title', 'Dashboard - Absensi kantor')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Dashboard Absensi</h1>
    <p class="text-sm text-slate-500 mt-1">Ringkasan data kehadiran dan aktivitas pegawai pabrik hari ini</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
     <a href="{{ route('admin-kantor.data-pegawai') }}">
    <!-- Total Pegawai -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Total Pegawai</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">342</p>
            <p class="text-xs font-medium text-blue-500">Pegawai aktif</p>
        </div>
        <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
            <i class="bi bi-people-fill text-xl"></i>
        </div>
    </div>
     </a>

    <!-- Hadir Hari Ini -->
    <a href="{{ route('admin-kantor.rekap-absensi') }}">
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Kehadiran</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">324</p>
            <p class="text-xs font-medium text-blue-500">94. 7% kehadiran</p>
        </div>
        <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center text-blue-500">
            <i class="bi bi-check-circle-fill text-xl"></i>
        </div>
    </div>
    </a>
    
<a href="{{ route('admin-kantor.rekap-absensi') }}">
    <!-- Tidak Hadir -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Tidak Hadir</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">12</p>
            <p class="text-xs font-medium text-amber-500">Izin:  8, Sakit: 4</p>
        </div>
        <div class="w-11 h-11 bg-amber-100 rounded-xl flex items-center justify-center text-amber-500">
            <i class="bi bi-exclamation-triangle-fill text-xl"></i>
        </div>
    </div>
</a>

<a href="{{ route('admin-kantor.rekap-absensi') }}">
    <!-- Terlambat -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 flex justify-between items-start">
        <div>
            <p class="text-sm text-slate-500 mb-2">Terlambat</p>
            <p class="text-3xl font-bold text-slate-800 mb-2">6</p>
            <p class="text-xs font-medium text-red-500">1. 75% dari total</p>
        </div>
        <div class="w-11 h-11 bg-red-100 rounded-xl flex items-center justify-center text-red-500">
            <i class="bi bi-clock-fill text-xl"></i>
        </div>
    </div>
</a>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Bar Chart - Grafik Kehadiran Mingguan -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-200">
            <h3 class="text-base font-semibold text-slate-800">Grafik Kehadiran Mingguan</h3>
        </div>
        <div class="p-5">
            <div class="h-52 flex items-end justify-around gap-4 px-4">
                <!-- Bar Chart Visualization -->
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 bg-blue-400 rounded-t-md" style="height: 120px;"></div>
                    <span class="text-xs text-slate-500">Sen</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 bg-blue-400 rounded-t-md" style="height: 100px;"></div>
                    <span class="text-xs text-slate-500">Sel</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 bg-blue-400 rounded-t-md" style="height: 130px;"></div>
                    <span class="text-xs text-slate-500">Rab</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 bg-blue-500 rounded-t-md" style="height: 160px;"></div>
                    <span class="text-xs text-slate-500">Kam</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 bg-blue-400 rounded-t-md" style="height: 140px;"></div>
                    <span class="text-xs text-slate-500">Jum</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 bg-blue-300 rounded-t-md" style="height: 80px;"></div>
                    <span class="text-xs text-slate-500">Sab</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Donut Chart - Status Kehadiran Hari Ini -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-200">
            <h3 class="text-base font-semibold text-slate-800">Status Kehadiran Hari Ini</h3>
        </div>
        <div class="p-5">
            <div class="h-52 flex items-center justify-center">
                <!-- Donut Chart Visualization -->
                <div class="relative">
                    <svg class="w-40 h-40 transform -rotate-90">
                        <circle cx="80" cy="80" r="60" stroke="#e2e8f0" stroke-width="20" fill="none"/>
                        <circle cx="80" cy="80" r="60" stroke="#22c55e" stroke-width="20" fill="none"
                                stroke-dasharray="358" stroke-dashoffset="19" stroke-linecap="round"/>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl font-bold text-slate-800">94.7%</span>
                        <span class="text-sm text-slate-500">Kehadiran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Activity Section -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-200">
        <h3 class="text-base font-semibold text-slate-800">Aktivitas Absensi Terbaru</h3>
    </div>
    <div class="p-5">
        <!-- Activity Item 1 -->
        <div class="flex items-start gap-4 py-4 border-b border-slate-100">
            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                BW
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Budi Wijaya</span> melakukan absen masuk
                </p>
                <p class="text-xs text-slate-400 mt-1">Shift:  Pagi (07:00) - Departemen Produksi</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">2 menit lalu</span>
        </div>

        <!-- Activity Item 2 -->
        <div class="flex items-start gap-4 py-4 border-b border-slate-100">
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                SA
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Siti Aminah</span> melakukan absen pulang
                </p>
                <p class="text-xs text-slate-400 mt-1">Shift: Malam (23:00) - Departemen QC</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">8 menit lalu</span>
        </div>

        <!-- Activity Item 3 -->
        <div class="flex items-start gap-4 py-4 border-b border-slate-100">
            <div class="w-10 h-10 bg-amber-500 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                AR
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Ahmad Rizki</span> mengajukan izin sakit
                </p>
                <p class="text-xs text-slate-400 mt-1">Tanggal: 25 Des 2025 - Menunggu persetujuan</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">15 menit lalu</span>
        </div>

        <!-- Activity Item 4 -->
        <div class="flex items-start gap-4 py-4 border-b border-slate-100">
            <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                DP
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Dewi Puspita</span> melakukan absen masuk
                </p>
                <p class="text-xs text-slate-400 mt-1">Shift: Siang (14:00) - Departemen Warehouse</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">22 menit lalu</span>
        </div>

        <!-- Activity Item 5 -->
        <div class="flex items-start gap-4 py-4">
            <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center text-white text-xs font-semibold shrink-0">
                RH
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-700">
                    <span class="font-semibold">Rahmat Hidayat</span> terlambat absen masuk
                </p>
                <p class="text-xs text-slate-400 mt-1">Shift: Pagi (07:15) - Terlambat 15 menit</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap">35 menit lalu</span>
        </div>
    </div>
</div>
@endsection