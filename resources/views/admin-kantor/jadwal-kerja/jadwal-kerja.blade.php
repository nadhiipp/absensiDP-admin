@extends('layouts.kantor.app')

@section('title', 'Jadwal Kerja - Admin Kantor')

@section('content')
<!-- Page Header -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-slate-800">Jadwal Kerja</h1>
        <p class="text-sm text-slate-500 mt-1">Kelola jadwal kerja, shift, dan kalender kantor</p>
    </div>
    <div class="flex gap-3 mt-4 lg:mt-0">
        <button onclick="openModalKalender()" class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
            <i class="bi bi-calendar-plus"></i>
            Tambah Event
        </button>
        <button onclick="openModalJadwal()" class="px-4 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all inline-flex items-center gap-2 shadow-lg shadow-blue-500/30">
            <i class="bi bi-plus-lg"></i>
            Buat Jadwal Kerja
        </button>
    </div>
</div>

<!-- Tab Navigation -->
<div class="bg-white border border-slate-200 rounded-xl mb-6">
    <div class="flex border-b border-slate-200">
        <button onclick="showTab('kalender')" id="tab-kalender" class="tab-btn flex-1 px-6 py-4 text-sm font-medium text-blue-600 border-b-2 border-blue-500 bg-blue-50/50 transition-all inline-flex items-center justify-center gap-2">
            <i class="bi bi-calendar3"></i>
            Kalender Kerja
        </button>
        <button onclick="showTab('shift')" id="tab-shift" class="tab-btn flex-1 px-6 py-4 text-sm font-medium text-slate-500 border-b-2 border-transparent hover:text-slate-700 hover:bg-slate-50 transition-all inline-flex items-center justify-center gap-2">
            <i class="bi bi-clock-history"></i>
            Pengaturan Shift
        </button>
        <button onclick="showTab('jadwal')" id="tab-jadwal" class="tab-btn flex-1 px-6 py-4 text-sm font-medium text-slate-500 border-b-2 border-transparent hover: text-slate-700 hover:bg-slate-50 transition-all inline-flex items-center justify-center gap-2">
            <i class="bi bi-person-lines-fill"></i>
            Jadwal Pegawai
        </button>
        <button onclick="showTab('libur')" id="tab-libur" class="tab-btn flex-1 px-6 py-4 text-sm font-medium text-slate-500 border-b-2 border-transparent hover: text-slate-700 hover:bg-slate-50 transition-all inline-flex items-center justify-center gap-2">
            <i class="bi bi-calendar-x"></i>
            Hari Libur & Cuti
        </button>
    </div>
</div>

<!-- Tab Content:  Kalender -->
<div id="content-kalender" class="tab-content">
    <!-- Kalender Header -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 mb-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 border border-slate-200 rounded-lg flex items-center justify-center hover:bg-slate-50 transition-all">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <h3 class="text-xl font-semibold text-slate-800">Januari 2026</h3>
                <button class="w-10 h-10 border border-slate-200 rounded-lg flex items-center justify-center hover:bg-slate-50 transition-all">
                    <i class="bi bi-chevron-right"></i>
                </button>
                <button class="px-4 py-2 text-sm font-medium text-blue-600 hover: bg-blue-50 rounded-lg transition-all">
                    Hari Ini
                </button>
            </div>
            <div class="flex items-center gap-3">
                <select class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500">
                    <option>Tampilan Bulan</option>
                    <option>Tampilan Minggu</option>
                    <option>Tampilan Tahun</option>
                </select>
                <div class="flex items-center gap-4 text-sm">
                    <span class="flex items-center gap-2"><span class="w-3 h-3 bg-blue-500 rounded-full"></span> Kerja</span>
                    <span class="flex items-center gap-2"><span class="w-3 h-3 bg-red-500 rounded-full"></span> Libur</span>
                    <span class="flex items-center gap-2"><span class="w-3 h-3 bg-amber-500 rounded-full"></span> Cuti</span>
                    <span class="flex items-center gap-2"><span class="w-3 h-3 bg-green-500 rounded-full"></span> Event</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Kalender Grid -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <!-- Header Hari -->
        <div class="grid grid-cols-7 bg-slate-50 border-b border-slate-200">
            <div class="px-4 py-3 text-center text-sm font-semibold text-red-500">Minggu</div>
            <div class="px-4 py-3 text-center text-sm font-semibold text-slate-600">Senin</div>
            <div class="px-4 py-3 text-center text-sm font-semibold text-slate-600">Selasa</div>
            <div class="px-4 py-3 text-center text-sm font-semibold text-slate-600">Rabu</div>
            <div class="px-4 py-3 text-center text-sm font-semibold text-slate-600">Kamis</div>
            <div class="px-4 py-3 text-center text-sm font-semibold text-slate-600">Jumat</div>
            <div class="px-4 py-3 text-center text-sm font-semibold text-slate-600">Sabtu</div>
        </div>

        <!-- Calendar Days -->
        @php
            $events = [
                1 => ['type' => 'libur', 'title' => 'Tahun Baru'],
                6 => ['type' => 'event', 'title' => 'Meeting Bulanan'],
                12 => ['type' => 'cuti', 'title' => 'Cuti Bersama'],
                25 => ['type' => 'libur', 'title' => 'Imlek'],
            ];
        @endphp

        <div class="grid grid-cols-7">
            @for($week = 0; $week < 5; $week++)
                @for($day = 0; $day < 7; $day++)
                    @php
                        $dayNum = ($week * 7) + $day - 2; // Adjust for starting day
                        $isCurrentMonth = $dayNum >= 1 && $dayNum <= 31;
                        $isToday = $dayNum == 6;
                        $isSunday = $day == 0;
                        $event = $events[$dayNum] ?? null;
                    @endphp
                    <div class="min-h-[120px] border-b border-r border-slate-100 p-2 {{ ! $isCurrentMonth ? 'bg-slate-50' : '' }} hover:bg-slate-50 transition-all cursor-pointer group">
                        @if($isCurrentMonth)
                            <div class="flex items-start justify-between">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-medium {{ $isToday ?  'bg-blue-500 text-white' : ($isSunday ?  'text-red-500' : 'text-slate-700') }} {{ $isToday ? '' : 'group-hover:bg-slate-200' }}">
                                    {{ $dayNum }}
                                </span>
                                <button class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center text-xs">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            @if($event)
                                <div class="mt-2 px-2 py-1 rounded-md text-xs font-medium truncate
                                    {{ $event['type'] == 'libur' ? 'bg-red-100 text-red-700' :  '' }}
                                    {{ $event['type'] == 'cuti' ? 'bg-amber-100 text-amber-700' :  '' }}
                                    {{ $event['type'] == 'event' ? 'bg-green-100 text-green-700' : '' }}">
                                    {{ $event['title'] }}
                                </div>
                            @endif
                        @endif
                    </div>
                @endfor
            @endfor
        </div>
    </div>
</div>

<!-- Tab Content: Shift -->
<div id="content-shift" class="tab-content hidden">
    <!-- Shift Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
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
                    <span class="px-2.5 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Aktif</span>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-100 flex gap-2">
                <button onclick="openModalEditShift()" class="flex-1 px-3 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                    <i class="bi bi-pencil"></i> Edit
                </button>
                <button class="flex-1 px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-lg transition-all">
                    <i class="bi bi-people"></i> Lihat
                </button>
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
                    <span class="px-2.5 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Aktif</span>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-100 flex gap-2">
                <button onclick="openModalEditShift()" class="flex-1 px-3 py-2 text-sm font-medium text-blue-600 hover: bg-blue-50 rounded-lg transition-all">
                    <i class="bi bi-pencil"></i> Edit
                </button>
                <button class="flex-1 px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-lg transition-all">
                    <i class="bi bi-people"></i> Lihat
                </button>
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
                    <span class="px-2.5 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Aktif</span>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-100 flex gap-2">
                <button onclick="openModalEditShift()" class="flex-1 px-3 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                    <i class="bi bi-pencil"></i> Edit
                </button>
                <button class="flex-1 px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-lg transition-all">
                    <i class="bi bi-people"></i> Lihat
                </button>
            </div>
        </div>
    </div>

    <!-- Add New Shift Button -->
    <div onclick="openModalShift()" class="bg-white border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-blue-400 hover:bg-blue-50/50 transition-all cursor-pointer mb-6" onclick="openModalShift()">
        <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="bi bi-plus-lg text-2xl text-slate-400"></i>
        </div>
        <p class="text-sm font-medium text-slate-600">Tambah Shift Baru</p>
        <p class="text-xs text-slate-400 mt-1">Klik untuk membuat shift kerja baru</p>
    </div>
</div>

<!-- Tab Content: Jadwal Pegawai -->
<div id="content-jadwal" class="tab-content hidden">
    <!-- Filters -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Periode</label>
                <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-blue-500">
                    <option>Minggu Ini</option>
                    <option>Bulan Ini</option>
                    <option>3 Bulan</option>
                    <option>1 Tahun</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Departemen</label>
                <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500">
                    <option>Semua Departemen</option>
                    <option>Produksi</option>
                    <option>Quality Control</option>
                    <option>Warehouse</option>
                    <option>HRD</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Shift</label>
                <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500">
                    <option>Semua Shift</option>
                    <option>Pagi</option>
                    <option>Siang</option>
                    <option>Malam</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Cari Pegawai</label>
                <input type="text" placeholder="Nama atau NIP..." class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex items-end">
                <button class="w-full px-4 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Weekly Schedule View -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <h3 class="text-base font-semibold text-slate-800">Jadwal Minggu Ini</h3>
                <span class="text-sm text-slate-500">5 - 11 Januari 2026</span>
            </div>
            <div class="flex gap-3">
                <button class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover:bg-slate-50 transition-all inline-flex items-center gap-2">
                    <i class="bi bi-download"></i>
                    Export
                </button>
                <button class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-slate-600 bg-white hover: bg-slate-50 transition-all inline-flex items-center gap-2">
                    <i class="bi bi-printer"></i>
                    Cetak
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide sticky left-0 bg-slate-50 min-w-[200px]">Pegawai</th>
                        <th class="text-center px-4 py-4 text-xs font-semibold text-red-500 uppercase tracking-wide min-w-[100px]">Minggu<br><span class="text-slate-400">5 Jan</span></th>
                        <th class="text-center px-4 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide min-w-[100px]">Senin<br><span class="text-slate-400">6 Jan</span></th>
                        <th class="text-center px-4 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide min-w-[100px]">Selasa<br><span class="text-slate-400">7 Jan</span></th>
                        <th class="text-center px-4 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide min-w-[100px]">Rabu<br><span class="text-slate-400">8 Jan</span></th>
                        <th class="text-center px-4 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide min-w-[100px]">Kamis<br><span class="text-slate-400">9 Jan</span></th>
                        <th class="text-center px-4 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide min-w-[100px]">Jumat<br><span class="text-slate-400">10 Jan</span></th>
                        <th class="text-center px-4 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wide min-w-[100px]">Sabtu<br><span class="text-slate-400">11 Jan</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @php
                        $jadwal = [
                            ['nip' => 'PB001', 'nama' => 'Budi Santoso', 'dept' => 'Produksi', 'schedule' => ['Libur', 'Pagi', 'Pagi', 'Pagi', 'Pagi', 'Pagi', 'Libur']],
                            ['nip' => 'PB002', 'nama' => 'Siti Aminah', 'dept' => 'Quality Control', 'schedule' => ['Libur', 'Pagi', 'Pagi', 'Cuti', 'Cuti', 'Pagi', 'Libur']],
                            ['nip' => 'PB003', 'nama' => 'Ahmad Wijaya', 'dept' => 'Warehouse', 'schedule' => ['Libur', 'Siang', 'Siang', 'Siang', 'Siang', 'Siang', 'Libur']],
                            ['nip' => 'PB004', 'nama' => 'Dewi Lestari', 'dept' => 'HRD', 'schedule' => ['Libur', 'Pagi', 'Pagi', 'Pagi', 'Pagi', 'Pagi', 'Libur']],
                            ['nip' => 'PB005', 'nama' => 'Rizki Pratama', 'dept' => 'Maintenance', 'schedule' => ['Libur', 'Malam', 'Malam', 'Malam', 'Libur', 'Malam', 'Malam']],
                            ['nip' => 'PB006', 'nama' => 'Lina Marlina', 'dept' => 'Produksi', 'schedule' => ['Libur', 'Siang', 'Siang', 'Siang', 'Siang', 'Siang', 'Libur']],
                        ];
                    @endphp

                    @foreach($jadwal as $j)
                    <tr class="hover:bg-slate-50 transition-all">
                        <td class="px-5 py-4 sticky left-0 bg-white">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-medium">
                                    {{ strtoupper(substr($j['nama'], 0, 2)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-slate-800">{{ $j['nama'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $j['nip'] }} · {{ $j['dept'] }}</p>
                                </div>
                            </div>
                        </td>
                        @foreach($j['schedule'] as $s)
                        <td class="px-4 py-4 text-center">
                            @if($s == 'Pagi')
                                <span class="px-3 py-1.5 bg-amber-100 text-amber-700 text-xs font-medium rounded-lg">Pagi</span>
                            @elseif($s == 'Siang')
                                <span class="px-3 py-1.5 bg-orange-100 text-orange-700 text-xs font-medium rounded-lg">Siang</span>
                            @elseif($s == 'Malam')
                                <span class="px-3 py-1.5 bg-indigo-100 text-indigo-700 text-xs font-medium rounded-lg">Malam</span>
                            @elseif($s == 'Libur')
                                <span class="px-3 py-1.5 bg-slate-100 text-slate-500 text-xs font-medium rounded-lg">Libur</span>
                            @elseif($s == 'Cuti')
                                <span class="px-3 py-1.5 bg-red-100 text-red-700 text-xs font-medium rounded-lg">Cuti</span>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tab Content: Hari Libur & Cuti -->
<div id="content-libur" class="tab-content hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Hari Libur Nasional -->
        <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center bg-red-50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center text-white">
                        <i class="bi bi-calendar-x"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-slate-800">Hari Libur Nasional</h3>
                        <p class="text-xs text-slate-500">Tahun 2026</p>
                    </div>
                </div>
                <button onclick="openModalLibur()" class="px-3 py-1.5 bg-red-500 hover: bg-red-600 text-white rounded-lg text-xs font-medium transition-all inline-flex items-center gap-1">
                    <i class="bi bi-plus"></i> Tambah
                </button>
            </div>
            <div class="divide-y divide-slate-100 max-h-[400px] overflow-y-auto">
                @php
                    $libur = [
                        ['tanggal' => '1 Januari 2026', 'nama' => 'Tahun Baru Masehi'],
                        ['tanggal' => '25 Januari 2026', 'nama' => 'Tahun Baru Imlek'],
                        ['tanggal' => '28 Maret 2026', 'nama' => 'Hari Raya Nyepi'],
                        ['tanggal' => '3 April 2026', 'nama' => 'Wafat Isa Almasih'],
                        ['tanggal' => '1 Mei 2026', 'nama' => 'Hari Buruh'],
                        ['tanggal' => '13 Mei 2026', 'nama' => 'Kenaikan Isa Almasih'],
                        ['tanggal' => '1 Juni 2026', 'nama' => 'Hari Lahir Pancasila'],
                        ['tanggal' => '17 Agustus 2026', 'nama' => 'Hari Kemerdekaan RI'],
                        ['tanggal' => '25 Desember 2026', 'nama' => 'Hari Natal'],
                    ];
                @endphp
                @foreach($libur as $l)
                <div class="px-5 py-3 flex justify-between items-center hover:bg-slate-50 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                        <div>
                            <p class="text-sm font-medium text-slate-800">{{ $l['nama'] }}</p>
                            <p class="text-xs text-slate-500">{{ $l['tanggal'] }}</p>
                        </div>
                    </div>
                    <button class="text-slate-400 hover:text-red-500 transition-all">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Cuti Bersama -->
        <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center bg-amber-50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center text-white">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-slate-800">Cuti Bersama</h3>
                        <p class="text-xs text-slate-500">Tahun 2026</p>
                    </div>
                </div>
                <button onclick="openModalCuti()" class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg text-xs font-medium transition-all inline-flex items-center gap-1">
                    <i class="bi bi-plus"></i> Tambah
                </button>
            </div>
            <div class="divide-y divide-slate-100 max-h-[400px] overflow-y-auto">
                @php
                    $cuti = [
                        ['tanggal' => '2 Januari 2026', 'nama' => 'Cuti Bersama Tahun Baru'],
                        ['tanggal' => '26 Januari 2026', 'nama' => 'Cuti Bersama Imlek'],
                        ['tanggal' => '21-23 April 2026', 'nama' => 'Cuti Bersama Idul Fitri'],
                        ['tanggal' => '24 April 2026', 'nama' => 'Cuti Bersama Idul Fitri'],
                        ['tanggal' => '26 Desember 2026', 'nama' => 'Cuti Bersama Natal'],
                    ];
                @endphp
                @foreach($cuti as $c)
                <div class="px-5 py-3 flex justify-between items-center hover:bg-slate-50 transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                        <div>
                            <p class="text-sm font-medium text-slate-800">{{ $c['nama'] }}</p>
                            <p class="text-xs text-slate-500">{{ $c['tanggal'] }}</p>
                        </div>
                    </div>
                    <button class="text-slate-400 hover:text-red-500 transition-all">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Event Kantor -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden mt-6">
        <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center bg-green-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center text-white">
                    <i class="bi bi-calendar-event"></i>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-800">Event & Kegiatan Kantor</h3>
                    <p class="text-xs text-slate-500">Jadwal kegiatan perusahaan</p>
                </div>
            </div>
            <button onclick="openModalEvent()" class="px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-lg text-xs font-medium transition-all inline-flex items-center gap-1">
                <i class="bi bi-plus"></i> Tambah Event
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase">Nama Event</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase">Tanggal</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase">Waktu</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase">Lokasi</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase">Status</th>
                        <th class="text-center px-5 py-3 text-xs font-semibold text-slate-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-3 text-sm font-medium text-slate-800">Meeting Bulanan</td>
                        <td class="px-5 py-3 text-sm text-slate-600">6 Januari 2026</td>
                        <td class="px-5 py-3 text-sm text-slate-600">09:00 - 11:00</td>
                        <td class="px-5 py-3 text-sm text-slate-600">Ruang Meeting Lt. 3</td>
                        <td class="px-5 py-3"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Akan Datang</span></td>
                        <td class="px-5 py-3 text-center">
                            <button class="text-slate-400 hover:text-blue-500"><i class="bi bi-pencil"></i></button>
                            <button class="text-slate-400 hover:text-red-500 ml-2"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-3 text-sm font-medium text-slate-800">Training Pegawai Baru</td>
                        <td class="px-5 py-3 text-sm text-slate-600">15 Januari 2026</td>
                        <td class="px-5 py-3 text-sm text-slate-600">08:00 - 17:00</td>
                        <td class="px-5 py-3 text-sm text-slate-600">Aula Utama</td>
                        <td class="px-5 py-3"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Akan Datang</span></td>
                        <td class="px-5 py-3 text-center">
                            <button class="text-slate-400 hover:text-blue-500"><i class="bi bi-pencil"></i></button>
                            <button class="text-slate-400 hover:text-red-500 ml-2"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr class="hover: bg-slate-50">
                        <td class="px-5 py-3 text-sm font-medium text-slate-800">Outing Tahunan</td>
                        <td class="px-5 py-3 text-sm text-slate-600">20-21 Februari 2026</td>
                        <td class="px-5 py-3 text-sm text-slate-600">Full Day</td>
                        <td class="px-5 py-3 text-sm text-slate-600">Puncak, Bogor</td>
                        <td class="px-5 py-3"><span class="px-2.5 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Terjadwal</span></td>
                        <td class="px-5 py-3 text-center">
                            <button class="text-slate-400 hover:text-blue-500"><i class="bi bi-pencil"></i></button>
                            <button class="text-slate-400 hover:text-red-500 ml-2"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Buat Jadwal Kerja -->
@include('admin-kantor.jadwal-kerja.create')
@include('admin-kantor.jadwal-kerja.modal-shift')
@include('admin-kantor.jadwal-kerja.modal-libur')
@include('admin-kantor.jadwal-kerja.modal-cuti')
@include('admin-kantor.jadwal-kerja.modal-event')

<script>
    function showTab(tabName) {
        // Hide all content
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        // Remove active state from all tabs
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('text-blue-600', 'border-blue-500', 'bg-blue-50/50');
            el.classList.add('text-slate-500', 'border-transparent');
        });
        
        // Show selected content
        document.getElementById('content-' + tabName).classList.remove('hidden');
        // Add active state to selected tab
        const activeTab = document.getElementById('tab-' + tabName);
        activeTab.classList.remove('text-slate-500', 'border-transparent');
        activeTab.classList.add('text-blue-600', 'border-blue-500', 'bg-blue-50/50');
    }

    function openModalJadwal() {
        document.getElementById('modalJadwal').classList.remove('hidden');
        document.getElementById('modalJadwal').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModalJadwal() {
        document.getElementById('modalJadwal').classList.add('hidden');
        document.getElementById('modalJadwal').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

  
</script>
@endsection