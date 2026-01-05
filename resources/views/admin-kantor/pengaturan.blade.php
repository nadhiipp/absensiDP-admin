@extends('layouts.kantor.app')

@section('title', 'Pengaturan Sistem - Absensi Kantor')

@section('content')
<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-slate-800">Pengaturan Sistem</h1>
    <p class="text-sm text-slate-500 mt-1">Konfigurasi dan pengaturan sistem absensi kantor</p>
</div>

<!-- Pengaturan Umum -->
<div class="bg-white border border-slate-200 rounded-xl mb-6">
    <div class="px-6 py-4 border-b border-slate-200">
        <h3 class="text-base font-semibold text-slate-800">Pengaturan Umum</h3>
    </div>
    <div class="divide-y divide-slate-100">
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Nama Perusahaan</h4>
                <p class="text-sm text-slate-500 mt-0.5">PT Kantor Indonesia Jaya</p>
            </div>
            <button class="text-sm text-slate-500 hover: text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Alamat Kantor</h4>
                <p class="text-sm text-slate-500 mt-0.5">Jl. Industri No. 123, Kawasan Industri, Jakarta</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Nomor Telepon</h4>
                <p class="text-sm text-slate-500 mt-0.5">+62 21 1234 5678</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Email Perusahaan</h4>
                <p class="text-sm text-slate-500 mt-0.5">info@Kantorindonesia.com</p>
            </div>
            <button class="text-sm text-slate-500 hover: text-blue-600 font-medium">Ubah</button>
        </div>
    </div>
</div>

<!-- Pengaturan Absensi -->
<div class="bg-white border border-slate-200 rounded-xl mb-6">
    <div class="px-6 py-4 border-b border-slate-200">
        <h3 class="text-base font-semibold text-slate-800">Pengaturan Absensi</h3>
    </div>
    <div class="divide-y divide-slate-100">
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Toleransi Keterlambatan</h4>
                <p class="text-sm text-slate-500 mt-0.5">15 Menit</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Batas Waktu Absen Masuk</h4>
                <p class="text-sm text-slate-500 mt-0.5">2 jam sebelum shift dimulai</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Batas Waktu Absen Pulang</h4>
                <p class="text-sm text-slate-500 mt-0.5">2 jam setelah shift berakhir</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Metode Absensi</h4>
                <p class="text-sm text-slate-500 mt-0.5">Fingerprint, Face Recognition, QR Code</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Kelola</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Notifikasi Absensi</h4>
                <p class="text-sm text-slate-500 mt-0.5">Aktif - Email & WhatsApp</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Kelola</button>
        </div>
    </div>
</div>

<!-- Pengaturan Shift -->
<div class="bg-white border border-slate-200 rounded-xl mb-6">
    <div class="px-6 py-4 border-b border-slate-200">
        <h3 class="text-base font-semibold text-slate-800">Pengaturan Shift</h3>
    </div>
    <div class="divide-y divide-slate-100">
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Jumlah Shift Aktif</h4>
                <p class="text-sm text-slate-500 mt-0.5">3 Shift (Pagi, Siang, Malam)</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Kelola Shift</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Durasi Shift Standar</h4>
                <p class="text-sm text-slate-500 mt-0.5">8 jam per shift</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Rotasi Shift Otomatis</h4>
                <p class="text-sm text-slate-500 mt-0.5">Nonaktif</p>
            </div>
            <button class="px-4 py-1. 5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all">
                Aktifkan
            </button>
        </div>
    </div>
</div>

<!-- Pengaturan Cuti & Izin -->
<div class="bg-white border border-slate-200 rounded-xl mb-6">
    <div class="px-6 py-4 border-b border-slate-200">
        <h3 class="text-base font-semibold text-slate-800">Pengaturan Cuti & Izin</h3>
    </div>
    <div class="divide-y divide-slate-100">
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Kuota Cuti Tahunan</h4>
                <p class="text-sm text-slate-500 mt-0.5">12 Hari per tahun</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Batas Pengajuan Cuti</h4>
                <p class="text-sm text-slate-500 mt-0.5">7 Hari sebelum tanggal cuti</p>
            </div>
            <button class="text-sm text-slate-500 hover:text-blue-600 font-medium">Ubah</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Persetujuan Izin</h4>
                <p class="text-sm text-slate-500 mt-0.5">Memerlukan persetujuan supervisor</p>
            </div>
            <button class="text-sm text-slate-500 hover: text-blue-600 font-medium">Kelola</button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Jenis Cuti & Izin</h4>
                <p class="text-sm text-slate-500 mt-0.5">Cuti Tahunan, Sakit, Izin, Cuti Bersalin</p>
            </div>
            <button class="text-sm text-slate-500 hover: text-blue-600 font-medium">Kelola</button>
        </div>
    </div>
</div>

<!-- Danger Zone -->
<div class="bg-white border border-red-200 rounded-xl">
    <div class="px-6 py-4 border-b border-red-100 bg-red-50 rounded-t-xl">
        <h3 class="text-base font-semibold text-red-700">Zona Berbahaya</h3>
    </div>
    <div class="divide-y divide-slate-100">
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Reset Data Absensi</h4>
                <p class="text-sm text-slate-500 mt-0.5">Menghapus semua data absensi bulan ini</p>
            </div>
            <button class="px-4 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-all">
                Reset
            </button>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
            <div>
                <h4 class="text-sm font-medium text-slate-800">Export Semua Data</h4>
                <p class="text-sm text-slate-500 mt-0.5">Download backup seluruh data sistem</p>
            </div>
            <button class="px-4 py-1.5 border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 rounded-lg text-sm font-medium transition-all">
                Export
            </button>
        </div>
    </div>
</div>
@endsection