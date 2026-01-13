@extends('layouts.kantor.app')

@section('title', 'Detail Pegawai - Admin Kantor')

@section('content')
@php
    // Data dummy pegawai
    $pegawai = (object)[
        'nip' => 'PGW-2024-001',
        'nama' => 'Budi Santoso',
        'email' => 'budi. santoso@perusahaan.com',
        'telepon' => '081234567890',
        'departemen' => 'Teknologi Informasi',
        'jabatan' => 'Senior Developer',
        'tanggal_masuk' => '2020-03-15',
        'status' => 'aktif',
        'alamat' => 'Jl. Sudirman No. 123, Jakarta Selatan',
        'tempat_lahir' => 'Jakarta',
        'tanggal_lahir' => '1992-08-25',
        'jenis_kelamin' => 'Laki-laki',
        'agama' => 'Islam',
        'pendidikan' => 'S1 Teknik Informatika',
        'foto' => null
    ];
    
    // Data statistik absensi
    $statistik = [
        'hadir' => 245,
        'izin' => 5,
        'sakit' => 3,
        'alpha' => 0,
        'terlambat' => 8,
        'lembur' => 12
    ];
    
    // Riwayat absensi terakhir
    $riwayat = [
        ['tanggal' => '2026-01-06', 'masuk' => '07:55', 'pulang' => '17:02', 'status' => 'Hadir', 'keterangan' => 'Tepat Waktu'],
        ['tanggal' => '2026-01-05', 'masuk' => '08:15', 'pulang' => '17:30', 'status' => 'Hadir', 'keterangan' => 'Terlambat 15 menit'],
        ['tanggal' => '2026-01-04', 'masuk' => '07:45', 'pulang' => '17:00', 'status' => 'Hadir', 'keterangan' => 'Tepat Waktu'],
        ['tanggal' => '2026-01-03', 'masuk' => '-', 'pulang' => '-', 'status' => 'Izin', 'keterangan' => 'Keperluan Keluarga'],
        ['tanggal' => '2026-01-02', 'masuk' => '07:50', 'pulang' => '17:05', 'status' => 'Hadir', 'keterangan' => 'Tepat Waktu'],
    ];
@endphp

<!-- Page Header -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Detail Pegawai</h1>
        <p class="text-sm text-slate-500 mt-1">Informasi lengkap data pegawai</p>
    </div>
    <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
        <button onclick="openModalEdit()" class="px-4 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-medium transition-all inline-flex items-center gap-2 shadow-lg shadow-blue-500/25">
            <i class="bi bi-pencil-square"></i>
            Edit Profil
        </button>
        <button onclick="window.print()" class="px-4 py-2.5 border border-slate-200 rounded-xl text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
            <i class="bi bi-printer"></i>
            Cetak
        </button>
        <a href="{{ url('/kantor/data-pegawai') }}" class="px-4 py-2.5 border border-slate-200 rounded-xl text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- LEFT COLUMN -->
    <div class="lg:col-span-1 space-y-6">
        
        <!-- Profile Card -->
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
            <!-- Cover Background -->
            <div class="h-24 bg-gradient-to-r from-blue-500 to-indigo-600 relative">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            </div>
            
            <!-- Profile Info -->
            <div class="px-6 pb-6 -mt-12 text-center relative">
                <!-- Avatar -->
                <div class="relative inline-block">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-3xl font-bold border-4 border-white shadow-xl">
                        {{ strtoupper(substr($pegawai->nama, 0, 2)) }}
                    </div>
                    <!-- Status Badge -->
                    @if($pegawai->status == 'aktif')
                        <div class="absolute bottom-1 right-1 w-6 h-6 bg-emerald-500 rounded-full border-3 border-white flex items-center justify-center">
                            <i class="bi bi-check text-white text-xs"></i>
                        </div>
                    @else
                        <div class="absolute bottom-1 right-1 w-6 h-6 bg-slate-400 rounded-full border-3 border-white"></div>
                    @endif
                </div>
                
                <h2 class="text-xl font-bold text-slate-800 mt-4">{{ $pegawai->nama }}</h2>
                <p class="text-slate-500 text-sm">{{ $pegawai->jabatan }}</p>
                
                <!-- Status Badge -->
                <div class="mt-4">
                    @if($pegawai->status == 'aktif')
                        <span class="inline-flex items-center gap-1.5 px-4 py-1. 5 bg-emerald-50 text-emerald-700 rounded-full text-sm font-medium">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                            Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-slate-100 text-slate-600 rounded-full text-sm font-medium">
                            <span class="w-2 h-2 bg-slate-400 rounded-full"></span>
                            Tidak Aktif
                        </span>
                    @endif
                </div>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-3 gap-3 mt-6 pt-6 border-t border-slate-100">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-slate-800">{{ $statistik['hadir'] }}</p>
                        <p class="text-xs text-slate-500">Hadir</p>
                    </div>
                    <div class="text-center border-x border-slate-100">
                        <p class="text-2xl font-bold text-slate-800">{{ $statistik['izin'] + $statistik['sakit'] }}</p>
                        <p class="text-xs text-slate-500">Izin/Sakit</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-slate-800">{{ $statistik['lembur'] }}</p>
                        <p class="text-xs text-slate-500">Lembur</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Info Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6">
            <h3 class="text-base font-semibold text-slate-800 mb-4 flex items-center gap-2">
                <i class="bi bi-telephone text-blue-500"></i>
                Kontak
            </h3>
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                        <i class="bi bi-envelope text-blue-500"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-slate-400">Email</p>
                        <p class="text-sm font-medium text-slate-700 truncate">{{ $pegawai->email }}</p>
                    </div>
                    <a href="mailto:{{ $pegawai->email }}" class="w-8 h-8 bg-slate-100 hover:bg-blue-100 rounded-lg flex items-center justify-center transition-colors">
                        <i class="bi bi-box-arrow-up-right text-slate-500 text-xs"></i>
                    </a>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                        <i class="bi bi-phone text-emerald-500"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-slate-400">Telepon</p>
                        <p class="text-sm font-medium text-slate-700">{{ $pegawai->telepon }}</p>
                    </div>
                    <a href="tel:{{ $pegawai->telepon }}" class="w-8 h-8 bg-slate-100 hover:bg-emerald-100 rounded-lg flex items-center justify-center transition-colors">
                        <i class="bi bi-telephone-outbound text-slate-500 text-xs"></i>
                    </a>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-geo-alt text-amber-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs text-slate-400">Alamat</p>
                        <p class="text-sm font-medium text-slate-700">{{ $pegawai->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistik Kehadiran Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6">
            <h3 class="text-base font-semibold text-slate-800 mb-4 flex items-center gap-2">
                <i class="bi bi-bar-chart text-blue-500"></i>
                Statistik Kehadiran
            </h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-emerald-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center">
                            <i class="bi bi-check-circle text-white text-sm"></i>
                        </div>
                        <span class="text-sm font-medium text-slate-700">Hadir</span>
                    </div>
                    <span class="text-lg font-bold text-emerald-600">{{ $statistik['hadir'] }}</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="bi bi-file-text text-white text-sm"></i>
                        </div>
                        <span class="text-sm font-medium text-slate-700">Izin</span>
                    </div>
                    <span class="text-lg font-bold text-blue-600">{{ $statistik['izin'] }}</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-amber-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-amber-500 rounded-lg flex items-center justify-center">
                            <i class="bi bi-bandaid text-white text-sm"></i>
                        </div>
                        <span class="text-sm font-medium text-slate-700">Sakit</span>
                    </div>
                    <span class="text-lg font-bold text-amber-600">{{ $statistik['sakit'] }}</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-orange-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                            <i class="bi bi-clock text-white text-sm"></i>
                        </div>
                        <span class="text-sm font-medium text-slate-700">Terlambat</span>
                    </div>
                    <span class="text-lg font-bold text-orange-600">{{ $statistik['terlambat'] }}</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                            <i class="bi bi-x-circle text-white text-sm"></i>
                        </div>
                        <span class="text-sm font-medium text-slate-700">Alpha</span>
                    </div>
                    <span class="text-lg font-bold text-red-600">{{ $statistik['alpha'] }}</span>
                </div>
            </div>
        </div>
        
    </div>
    
    <!-- RIGHT COLUMN -->
    <div class="lg:col-span-2 space-y-6">
        
        <!-- Informasi Pegawai -->
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-base font-semibold text-slate-800 flex items-center gap-2">
                    <i class="bi bi-person-vcard text-blue-500"></i>
                    Informasi Pegawai
                </h3>
                <button onclick="openModalEdit()" class="text-sm text-blue-600 hover: text-blue-700 font-medium inline-flex items-center gap-1">
                    <i class="bi bi-pencil"></i>
                    Edit
                </button>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5">
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">NIP</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->nip }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Nama Lengkap</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->nama }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Departemen</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->departemen }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Jabatan</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->jabatan }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Email</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->email }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">No.  Telepon</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->telepon }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Tanggal Masuk</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ \Carbon\Carbon::parse($pegawai->tanggal_masuk)->format('d F Y') }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Masa Kerja</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">
                            {{ \Carbon\Carbon::parse($pegawai->tanggal_masuk)->diffForHumans(null, true) }}
                        </span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Status Pegawai</span>
                        <span class="text-right">
                            @if($pegawai->status == 'aktif')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-xs font-medium">
                                    <span class="w-1. 5 h-1.5 bg-emerald-500 rounded-full"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-medium">
                                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>
                                    Tidak Aktif
                                </span>
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Pendidikan</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->pendidikan }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Data Pribadi -->
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100">
                <h3 class="text-base font-semibold text-slate-800 flex items-center gap-2">
                    <i class="bi bi-person-badge text-blue-500"></i>
                    Data Pribadi
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5">
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Tempat Lahir</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->tempat_lahir }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Tanggal Lahir</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->format('d F Y') }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Jenis Kelamin</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->jenis_kelamin }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100">
                        <span class="text-sm text-slate-500">Agama</span>
                        <span class="text-sm font-semibold text-slate-800 text-right">{{ $pegawai->agama }}</span>
                    </div>
                    <div class="flex justify-between items-start py-3 border-b border-slate-100 md:col-span-2">
                        <span class="text-sm text-slate-500">Alamat Lengkap</span>
                        <span class="text-sm font-semibold text-slate-800 text-right max-w-sm">{{ $pegawai->alamat }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Riwayat Absensi -->
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-base font-semibold text-slate-800 flex items-center gap-2">
                    <i class="bi bi-calendar-check text-blue-500"></i>
                    Riwayat Absensi Terakhir
                </h3>
                <a href="#" class="text-sm text-blue-600 hover: text-blue-700 font-medium inline-flex items-center gap-1">
                    Lihat Semua
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr>
                            <th class="text-left px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Tanggal</th>
                            <th class="text-center px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Jam Masuk</th>
                            <th class="text-center px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Jam Pulang</th>
                            <th class="text-center px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Status</th>
                            <th class="text-left px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($riwayat as $r)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-sm font-medium text-slate-800">{{ \Carbon\Carbon::parse($r['tanggal'])->format('d M Y') }}</p>
                                <p class="text-xs text-slate-400">{{ \Carbon\Carbon::parse($r['tanggal'])->translatedFormat('l') }}</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-sm font-medium text-slate-700">{{ $r['masuk'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-sm font-medium text-slate-700">{{ $r['pulang'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($r['status'] == 'Hadir')
                                    <span class="inline-flex px-2. 5 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-xs font-medium">Hadir</span>
                                @elseif($r['status'] == 'Izin')
                                    <span class="inline-flex px-2.5 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium">Izin</span>
                                @elseif($r['status'] == 'Sakit')
                                    <span class="inline-flex px-2.5 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-medium">Sakit</span>
                                @else
                                    <span class="inline-flex px-2.5 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium">Alpha</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-600">{{ $r['keterangan'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<!-- Modal Edit Profil -->
<div id="modalEdit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-slate-800">Edit Profil Pegawai</h3>
            <button onclick="closeModalEdit()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center transition-colors">
                <i class="bi bi-x-lg text-slate-500"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-140px)]">
            <form class="space-y-5">
                <div class="grid grid-cols-1 md: grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1. 5">NIP</label>
                        <input type="text" value="{{ $pegawai->nip }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 bg-slate-50" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" value="{{ $pegawai->nama }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                        <input type="email" value="{{ $pegawai->email }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">No. Telepon</label>
                        <input type="text" value="{{ $pegawai->telepon }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Departemen</label>
                        <select class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 bg-white">
                            <option selected>{{ $pegawai->departemen }}</option>
                            <option>Human Resources</option>
                            <option>Finance</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jabatan</label>
                        <input type="text" value="{{ $pegawai->jabatan }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus: outline-none focus: border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                        <select class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 bg-white">
                            <option value="aktif" {{ $pegawai->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak_aktif" {{ $pegawai->status != 'aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Masuk</label>
                        <input type="date" value="{{ $pegawai->tanggal_masuk }}" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Alamat</label>
                        <textarea rows="3" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 resize-none">{{ $pegawai->alamat }}</textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-3">
            <button onclick="closeModalEdit()" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-50 transition-all">
                Batal
            </button>
            <button class="px-5 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-medium transition-all shadow-lg shadow-blue-500/25">
                Simpan Perubahan
            </button>
        </div>
    </div>
</div>

<script>
    function openModalEdit() {
        document. getElementById('modalEdit').classList.remove('hidden');
        document.getElementById('modalEdit').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModalEdit() {
        document.getElementById('modalEdit').classList.add('hidden');
        document.getElementById('modalEdit').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>
@endsection