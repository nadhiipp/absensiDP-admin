@extends('layouts.app')

@section('title', 'Pengaturan - Admin Kantor')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Pengaturan</h1>
    <p class="text-sm text-slate-500 mt-1">Kelola pengaturan sistem dan preferensi</p>
</div>

<!-- Profil Admin Section -->
<div class="bg-white border border-slate-200 rounded-xl p-6 mb-6">
    <!-- Section Header -->
    <div class="flex items-center gap-3 mb-1">
        <i class="bi bi-person text-blue-600 text-lg"></i>
        <h2 class="text-base font-semibold text-slate-800">Profil Admin</h2>
    </div>
    <p class="text-sm text-slate-500 mb-6 ml-7">Kelola informasi profil administrator</p>

    <!-- Form Fields -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <!-- Nama Lengkap -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
            <input type="text" 
                   value="Admin User" 
                   class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
            <input type="email" 
                   value="admin@kantor.com" 
                   class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100 transition-all">
        </div>

        <!-- Telepon -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Telepon</label>
            <input type="text" 
                   value="021-12345678" 
                   class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus: outline-none focus: border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
        </div>

        <!-- Role -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Role</label>
            <input type="text" 
                   value="Super Admin" 
                   disabled
                   class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-slate-100 text-slate-600 cursor-not-allowed">
        </div>
    </div>

    <!-- Save Button -->
    <div class="flex justify-end">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium inline-flex items-center gap-2 transition-all cursor-pointer">
            <i class="bi bi-save"></i>
            Simpan Perubahan
        </button>
    </div>
</div>

<!-- Keamanan Section -->
<div class="bg-white border border-slate-200 rounded-xl p-6 mb-6">
    <!-- Section Header -->
    <div class="flex items-center gap-3 mb-1">
        <i class="bi bi-shield-lock text-blue-600 text-lg"></i>
        <h2 class="text-base font-semibold text-slate-800">Keamanan</h2>
    </div>
    <p class="text-sm text-slate-500 mb-6 ml-7">Kelola pengaturan keamanan akun</p>

    <!-- Password Fields -->
    <div class="space-y-5 mb-5">
        <!-- Password Saat Ini -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Password Saat Ini</label>
            <input type="password" 
                   placeholder=""
                   class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100 transition-all">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <!-- Password Baru -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Password Baru</label>
                <input type="password" 
                       placeholder=""
                       class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus: ring-2 focus:ring-blue-100 transition-all">
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Konfirmasi Password</label>
                <input type="password" 
                       placeholder=""
                       class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus: ring-2 focus:ring-blue-100 transition-all">
            </div>
        </div>
    </div>

    <!-- Two Factor Auth -->
    <div class="flex items-center justify-between py-4 border-t border-slate-100 mb-5">
        <div>
            <h3 class="text-sm font-medium text-slate-800">Autentikasi Dua Faktor</h3>
            <p class="text-sm text-slate-500 mt-0.5">Tambahan keamanan untuk akun Anda</p>
        </div>
        <!-- Toggle Switch -->
        <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" class="sr-only peer">
            <div class="w-11 h-6 bg-slate-200 peer-focus: outline-none peer-focus:ring-2 peer-focus:ring-blue-100 rounded-full peer peer-checked:after:translate-x-full peer-checked: after:border-white after:content-[''] after: absolute after:top-[2px] after: left-[2px] after:bg-white after:border-slate-300 after:border after: rounded-full after: h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
        </label>
    </div>

    <!-- Update Password Button -->
    <div class="flex justify-end">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium inline-flex items-center gap-2 transition-all cursor-pointer">
            <i class="bi bi-save"></i>
            Update Password
        </button>
    </div>
</div>

<!-- Notifikasi Section -->
<div class="bg-white border border-slate-200 rounded-xl p-6 mb-6">
    <!-- Section Header -->
    <div class="flex items-center gap-3 mb-1">
        <i class="bi bi-bell text-blue-600 text-lg"></i>
        <h2 class="text-base font-semibold text-slate-800">Notifikasi</h2>
    </div>
    <p class="text-sm text-slate-500 mb-6 ml-7">Kelola preferensi notifikasi</p>

    <!-- Notification Options -->
    <div class="space-y-4">
        <!-- Email Notification -->
        <div class="flex items-center justify-between py-3 border-b border-slate-100">
            <div>
                <h3 class="text-sm font-medium text-slate-800">Notifikasi Email</h3>
                <p class="text-sm text-slate-500 mt-0.5">Terima notifikasi melalui email</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-100 rounded-full peer peer-checked: after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after: left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after: w-5 after:transition-all peer-checked:bg-blue-600"></div>
            </label>
        </div>

        <!-- Push Notification -->
        <div class="flex items-center justify-between py-3 border-b border-slate-100">
            <div>
                <h3 class="text-sm font-medium text-slate-800">Notifikasi Push</h3>
                <p class="text-sm text-slate-500 mt-0.5">Terima notifikasi push di browser</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 peer-focus: outline-none peer-focus:ring-2 peer-focus: ring-blue-100 rounded-full peer peer-checked:after:translate-x-full peer-checked: after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after: border after:rounded-full after:h-5 after:w-5 after: transition-all peer-checked:bg-blue-600"></div>
            </label>
        </div>

        <!-- Activity Notification -->
        <div class="flex items-center justify-between py-3 border-b border-slate-100">
            <div>
                <h3 class="text-sm font-medium text-slate-800">Aktivitas Pegawai</h3>
                <p class="text-sm text-slate-500 mt-0.5">Notifikasi saat ada aktivitas pegawai baru</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 peer-focus: outline-none peer-focus:ring-2 peer-focus: ring-blue-100 rounded-full peer peer-checked:after:translate-x-full peer-checked: after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after: border after:rounded-full after:h-5 after:w-5 after: transition-all peer-checked:bg-blue-600"></div>
            </label>
        </div>

        <!-- Report Notification -->
        <div class="flex items-center justify-between py-3">
            <div>
                <h3 class="text-sm font-medium text-slate-800">Laporan Selesai</h3>
                <p class="text-sm text-slate-500 mt-0.5">Notifikasi saat laporan selesai diproses</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-100 rounded-full peer peer-checked: after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after: left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after: w-5 after:transition-all peer-checked:bg-blue-600"></div>
            </label>
        </div>
    </div>
</div>

<!-- Sistem Section -->
<div class="bg-white border border-slate-200 rounded-xl p-6">
    <!-- Section Header -->
    <div class="flex items-center gap-3 mb-1">
        <i class="bi bi-gear text-blue-600 text-lg"></i>
        <h2 class="text-base font-semibold text-slate-800">Sistem</h2>
    </div>
    <p class="text-sm text-slate-500 mb-6 ml-7">Pengaturan sistem aplikasi</p>

    <!-- System Settings -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <!-- Bahasa -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Bahasa</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all cursor-pointer">
                <option value="id" selected>Indonesia</option>
                <option value="en">English</option>
            </select>
        </div>

        <!-- Zona Waktu -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Zona Waktu</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100 transition-all cursor-pointer">
                <option value="WIB" selected>WIB (Jakarta)</option>
                <option value="WITA">WITA (Makassar)</option>
                <option value="WIT">WIT (Jayapura)</option>
            </select>
        </div>

        <!-- Format Tanggal -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Format Tanggal</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100 transition-all cursor-pointer">
                <option value="dd/mm/yyyy" selected>DD/MM/YYYY</option>
                <option value="mm/dd/yyyy">MM/DD/YYYY</option>
                <option value="yyyy-mm-dd">YYYY-MM-DD</option>
            </select>
        </div>

        <!-- Tema -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Tema</label>
            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100 transition-all cursor-pointer">
                <option value="light" selected>Light</option>
                <option value="dark">Dark</option>
                <option value="auto">Auto (Sistem)</option>
            </select>
        </div>
    </div>

    <!-- Save Button -->
    <div class="flex justify-end">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium inline-flex items-center gap-2 transition-all cursor-pointer">
            <i class="bi bi-save"></i>
            Simpan Pengaturan
        </button>
    </div>
</div>
@endsection