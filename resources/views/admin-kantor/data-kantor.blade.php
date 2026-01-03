@extends('layouts.app')

@section('title', 'Data Kantor - Admin Kantor')

@section('content')
<!-- Page Header -->
<div class="flex justify-between items-start mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-slate-800">Data Kantor</h1>
        <p class="text-sm text-slate-500 mt-1">Kelola informasi kantor dan cabang</p>
    </div>
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium inline-flex items-center gap-2 transition-all cursor-pointer">
        <i class="bi bi-plus-lg"></i>
        Tambah Kantor
    </button>
</div>

<!-- Search and Filter -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-6">
    <div class="flex flex-col lg:flex-row gap-4 justify-between items-center">
        <div class="relative flex-1 w-full">
            <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input type="text" 
                   placeholder="Cari kantor..." 
                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </div>
        <div class="flex gap-3">
            <button class="px-5 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-all cursor-pointer">
                Semua Tipe
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
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Nama Kantor</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Tipe</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Alamat</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Kontak</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Pegawai</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <!-- Row 1 -->
                <tr class="hover:bg-slate-50 transition-all">
                    <td class="px-5 py-4">
                        <span class="font-medium text-slate-800">Kantor Pusat Jakarta</span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-md">Pusat</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <i class="bi bi-geo-alt text-slate-400"></i>
                            Jl. Sudirman No. 123, Jakarta Pusat
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="text-sm">
                            <div class="flex items-center gap-2 text-slate-600">
                                <i class="bi bi-telephone text-slate-400 text-xs"></i>
                                021-12345678
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 mt-1">
                                <i class="bi bi-envelope text-slate-400 text-xs"></i>
                                pusat@kantor.com
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-700">150</td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-medium text-green-500">Aktif</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-1">
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all cursor-pointer">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-red-50 hover: text-red-500 transition-all cursor-pointer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Row 2 -->
                <tr class="hover: bg-slate-50 transition-all">
                    <td class="px-5 py-4">
                        <span class="font-medium text-slate-800">Kantor Cabang Surabaya</span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-md">Cabang</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <i class="bi bi-geo-alt text-slate-400"></i>
                            Jl. Pemuda No. 45, Surabaya
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="text-sm">
                            <div class="flex items-center gap-2 text-slate-600">
                                <i class="bi bi-telephone text-slate-400 text-xs"></i>
                                031-87654321
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 mt-1">
                                <i class="bi bi-envelope text-slate-400 text-xs"></i>
                                surabaya@kantor.com
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-700">85</td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-medium text-green-500">Aktif</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-1">
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all cursor-pointer">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all cursor-pointer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Row 3 -->
                <tr class="hover:bg-slate-50 transition-all">
                    <td class="px-5 py-4">
                        <span class="font-medium text-slate-800">Kantor Regional Bandung</span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-medium rounded-md">Regional</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <i class="bi bi-geo-alt text-slate-400"></i>
                            Jl. Asia Afrika No. 67, Bandung
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="text-sm">
                            <div class="flex items-center gap-2 text-slate-600">
                                <i class="bi bi-telephone text-slate-400 text-xs"></i>
                                022-98765432
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 mt-1">
                                <i class="bi bi-envelope text-slate-400 text-xs"></i>
                                bandung@kantor. com
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-700">120</td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-medium text-green-500">Aktif</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-1">
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all cursor-pointer">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all cursor-pointer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Row 4 -->
                <tr class="hover:bg-slate-50 transition-all">
                    <td class="px-5 py-4">
                        <span class="font-medium text-slate-800">Kantor Perwakilan Yogyakarta</span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-md">Perwakilan</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <i class="bi bi-geo-alt text-slate-400"></i>
                            Jl.  Malioboro No. 89, Yogyakarta
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="text-sm">
                            <div class="flex items-center gap-2 text-slate-600">
                                <i class="bi bi-telephone text-slate-400 text-xs"></i>
                                0274-56789012
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 mt-1">
                                <i class="bi bi-envelope text-slate-400 text-xs"></i>
                                jogja@kantor. com
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-700">45</td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-medium text-green-500">Aktif</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-1">
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all cursor-pointer">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all cursor-pointer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Row 5 -->
                <tr class="hover:bg-slate-50 transition-all">
                    <td class="px-5 py-4">
                        <span class="font-medium text-slate-800">Kantor Cabang Medan</span>
                    </td>
                    <td class="px-5 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-md">Cabang</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <i class="bi bi-geo-alt text-slate-400"></i>
                            Jl. Gatot Subroto No. 34, Medan
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="text-sm">
                            <div class="flex items-center gap-2 text-slate-600">
                                <i class="bi bi-telephone text-slate-400 text-xs"></i>
                                061-23456789
                            </div>
                            <div class="flex items-center gap-2 text-slate-500 mt-1">
                                <i class="bi bi-envelope text-slate-400 text-xs"></i>
                                medan@kantor.com
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-slate-700">70</td>
                    <td class="px-5 py-4">
                        <span class="text-sm font-medium text-slate-400">Nonaktif</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-1">
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-all cursor-pointer">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="w-8 h-8 inline-flex items-center justify-center rounded-lg text-slate-400 hover: bg-red-50 hover:text-red-500 transition-all cursor-pointer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection