@extends('layouts.app')

@section('title', 'Laporan Absensi')

@push('styles')
    <style>
        .laporan-types {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .laporan-type-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            border: 2px solid var(--border-color);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .laporan-type-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            opacity: 0.05;
            border-radius: 50%;
            right: -30px;
            top: -30px;
        }

        .laporan-type-card.blue::before {
            background: var(--primary-blue);
        }

        .laporan-type-card.green::before {
            background: var(--success-green);
        }

        .laporan-type-card.purple::before {
            background: #8B5CF6;
        }

        .laporan-type-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-blue);
        }

        .laporan-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .laporan-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .laporan-description {
            font-size: 14px;
            color: var(--text-gray);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .laporan-features {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }

        .laporan-feature {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-gray);
        }

        .laporan-feature i {
            color: var(--success-green);
            font-size: 12px;
        }

        .btn-generate {
            width: 100%;
            padding: 12px 20px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(76, 111, 255, 0.3);
        }

        /* Filter Section */
        .filter-section {
            background: white;
            border-radius: 16px;
            padding: 28px;
            border: 1px solid var(--border-color);
            margin-bottom: 28px;
        }

        .filter-section-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-section-title i {
            color: var(--primary-blue);
        }

        .filter-grid-laporan {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filter-group-label i {
            color: var(--text-light);
            font-size: 12px;
        }

        .filter-input-laporan {
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            color: var(--text-dark);
            background: white;
            outline: none;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .filter-input-laporan:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(76, 111, 255, 0.1);
        }

        .filter-actions-laporan {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .btn-filter-laporan {
            flex: 1;
            padding: 12px 24px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-filter-laporan:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(76, 111, 255, 0.3);
        }

        /* Report Preview */
        .report-preview {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
        }

        .report-preview-header {
            padding: 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .report-preview-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .report-preview-subtitle {
            font-size: 13px;
            color: var(--text-gray);
            margin-top: 4px;
        }

        .export-buttons {
            display: flex;
            gap: 12px;
        }

        .btn-export {
            padding: 10px 20px;
            background: white;
            color: var(--text-dark);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-export:hover {
            background: var(--bg-main);
        }

        .btn-export.excel:hover {
            border-color: var(--success-green);
            color: var(--success-green);
        }

        .btn-export.pdf:hover {
            border-color: var(--danger-red);
            color: var(--danger-red);
        }

        .btn-export.print:hover {
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .report-preview-body {
            padding: 32px;
        }

        /* Report Statistics */
        .report-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .report-stat-card {
            background: var(--bg-main);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .report-stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin: 0 auto 16px;
        }

        .report-stat-value {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .report-stat-label {
            font-size: 12px;
            color: var(--text-gray);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Report Chart */
        .report-chart-section {
            margin-bottom: 32px;
        }

        .report-chart-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .report-chart-placeholder {
            height: 300px;
            background: var(--bg-main);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
        }

        .report-chart-placeholder i {
            font-size: 48px;
            margin-bottom: 12px;
            opacity: 0.3;
        }

        /* Report Table */
        .report-table-section {
            margin-bottom: 32px;
        }

        .report-table-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
        }

        .report-table thead {
            background: var(--bg-main);
        }

        .report-table th {
            padding: 14px 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        .report-table td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
            color: var(--text-dark);
        }

        .report-table tbody tr:hover {
            background: #F9FAFB;
        }

        @media (max-width: 1200px) {
            .laporan-types {
                grid-template-columns: 1fr;
            }

            .filter-grid-laporan {
                grid-template-columns: 1fr;
            }

            .report-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .report-stats {
                grid-template-columns: 1fr;
            }

            .export-buttons {
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Laporan Absensi</h1>
        <p class="page-subtitle">Buat dan export laporan absensi dalam berbagai format</p>
    </div>

    <!-- Laporan Type Cards -->
    <div class="laporan-types">
        <div class="laporan-type-card blue">
            <div class="laporan-icon" style="background: rgba(76, 111, 255, 0.1); color: var(--primary-blue);">
                <i class="fas fa-calendar-week"></i>
            </div>
            <div class="laporan-title">Laporan Harian</div>
            <div class="laporan-description">Rekap absensi siswa per hari dengan detail lengkap status kehadiran</div>
            <div class="laporan-features">
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Data kehadiran per siswa
                </div>
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Statistik per kelas
                </div>
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Grafik visualisasi
                </div>
            </div>
            <button class="btn-generate">
                <i class="fas fa-file-alt"></i>
                Buat Laporan
            </button>
        </div>

        <div class="laporan-type-card green">
            <div class="laporan-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--success-green);">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="laporan-title">Laporan Bulanan</div>
            <div class="laporan-description">Analisis kehadiran siswa per bulan dengan tren dan perbandingan</div>
            <div class="laporan-features">
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Tren kehadiran bulanan
                </div>
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Perbandingan antar kelas
                </div>
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Siswa dengan kehadiran rendah
                </div>
            </div>
            <button class="btn-generate">
                <i class="fas fa-file-alt"></i>
                Buat Laporan
            </button>
        </div>

        <div class="laporan-type-card purple">
            <div class="laporan-icon" style="background: rgba(139, 92, 246, 0.1); color: #8B5CF6;">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="laporan-title">Laporan Custom</div>
            <div class="laporan-description">Buat laporan sesuai kebutuhan dengan filter periode dan parameter</div>
            <div class="laporan-features">
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Pilih periode custom
                </div>
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Filter berdasarkan kelas
                </div>
                <div class="laporan-feature">
                    <i class="fas fa-check-circle"></i>
                    Export multi-format
                </div>
            </div>
            <button class="btn-generate">
                <i class="fas fa-file-alt"></i>
                Buat Laporan
            </button>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
        <div class="filter-section-title">
            <i class="fas fa-sliders-h"></i>
            Filter Laporan
        </div>

        <div class="filter-grid-laporan">
            <div class="filter-group">
                <label class="filter-group-label">
                    <i class="fas fa-calendar"></i>
                    Tanggal Mulai
                </label>
                <input type="date" class="filter-input-laporan" value="2026-01-01">
            </div>

            <div class="filter-group">
                <label class="filter-group-label">
                    <i class="fas fa-calendar"></i>
                    Tanggal Selesai
                </label>
                <input type="date" class="filter-input-laporan" value="2026-01-05">
            </div>

            <div class="filter-group">
                <label class="filter-group-label">
                    <i class="fas fa-door-open"></i>
                    Kelas
                </label>
                <select class="filter-input-laporan">
                    <option>Semua Kelas</option>
                    <option>Kelas X</option>
                    <option>Kelas XI</option>
                    <option>Kelas XII</option>
                    <option>X IPA 1</option>
                    <option>X IPA 2</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-group-label">
                    <i class="fas fa-filter"></i>
                    Jenis Laporan
                </label>
                <select class="filter-input-laporan">
                    <option>Laporan Lengkap</option>
                    <option>Laporan Ringkas</option>
                    <option>Hanya Statistik</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-group-label">
                    <i class="fas fa-sort"></i>
                    Urutkan Berdasarkan
                </label>
                <select class="filter-input-laporan">
                    <option>Nama Siswa (A-Z)</option>
                    <option>Kelas</option>
                    <option>Persentase Kehadiran</option>
                    <option>Jumlah Absen</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-group-label">
                    <i class="fas fa-file"></i>
                    Format Export
                </label>
                <select class="filter-input-laporan">
                    <option>Excel (.xlsx)</option>
                    <option>PDF (.pdf)</option>
                    <option>CSV (.csv)</option>
                </select>
            </div>
        </div>

        <div class="filter-actions-laporan">
            <button class="btn-filter-laporan">
                <i class="fas fa-chart-bar"></i>
                Generate Laporan
            </button>
            <button class="btn-reset">
                <i class="fas fa-redo"></i>
                Reset Filter
            </button>
        </div>
    </div>

    <!-- Report Preview -->
    <div class="report-preview">
        <div class="report-preview-header">
            <div>
                <div class="report-preview-title">Preview Laporan Absensi</div>
                <div class="report-preview-subtitle">Periode: 01 Januari 2026 - 05 Januari 2026</div>
            </div>
            <div class="export-buttons">
                <button class="btn-export excel">
                    <i class="fas fa-file-excel"></i>
                    Excel
                </button>
                <button class="btn-export pdf">
                    <i class="fas fa-file-pdf"></i>
                    PDF
                </button>
                <button class="btn-export print">
                    <i class="fas fa-print"></i>
                    Print
                </button>
            </div>
        </div>

        <div class="report-preview-body">
            <!-- Report Statistics -->
            <div class="report-stats">
                <div class="report-stat-card">
                    <div class="report-stat-icon"
                        style="background: rgba(76, 111, 255, 0.1); color: var(--primary-blue);">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="report-stat-value">847</div>
                    <div class="report-stat-label">Total Siswa</div>
                </div>

                <div class="report-stat-card">
                    <div class="report-stat-icon"
                        style="background: rgba(16, 185, 129, 0.1); color: var(--success-green);">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="report-stat-value">3,945</div>
                    <div class="report-stat-label">Total Hadir</div>
                </div>

                <div class="report-stat-card">
                    <div class="report-stat-icon"
                        style="background: rgba(245, 158, 11, 0.1); color: var(--warning-yellow);">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="report-stat-value">210</div>
                    <div class="report-stat-label">Izin/Sakit</div>
                </div>

                <div class="report-stat-card">
                    <div class="report-stat-icon" style="background: rgba(239, 68, 68, 0.1); color: var(--danger-red);">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="report-stat-value">80</div>
                    <div class="report-stat-label">Total Alpha</div>
                </div>
            </div>

            <!-- Report Chart -->
            <div class="report-chart-section">
                <div class="report-chart-title">
                    <i class="fas fa-chart-line"></i>
                    Grafik Kehadiran Harian
                </div>
                <div class="report-chart-placeholder">
                    <i class="fas fa-chart-area"></i>
                    <div>Grafik kehadiran akan ditampilkan di sini</div>
                </div>
            </div>

            <!-- Report Table -->
            <div class="report-table-section">
                <div class="report-table-title">
                    <i class="fas fa-table"></i>
                    Detail Rekap Per Kelas
                </div>
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Total Siswa</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpha</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>X IPA 1</strong></td>
                            <td>Siti Nurhaliza</td>
                            <td>36</td>
                            <td><span style="color: var(--success-green); font-weight: 600;">170</span></td>
                            <td><span style="color: var(--warning-yellow);">8</span></td>
                            <td><span style="color: var(--info-blue);">2</span></td>
                            <td><span style="color: var(--danger-red);">0</span></td>
                            <td><strong style="color: var(--success-green);">94.4%</strong></td>
                        </tr>
                        <tr>
                            <td><strong>X IPA 2</strong></td>
                            <td>Ahmad Firdaus</td>
                            <td>35</td>
                            <td><span style="color: var(--success-green); font-weight: 600;">165</span></td>
                            <td><span style="color: var(--warning-yellow);">10</span></td>
                            <td><span style="color: var(--info-blue);">0</span></td>
                            <td><span style="color: var(--danger-red);">0</span></td>
                            <td><strong style="color: var(--success-green);">94.3%</strong></td>
                        </tr>
                        <tr>
                            <td><strong>X IPS 1</strong></td>
                            <td>Budi Santoso</td>
                            <td>34</td>
                            <td><span style="color: var(--success-green); font-weight: 600;">155</span></td>
                            <td><span style="color: var(--warning-yellow);">10</span></td>
                            <td><span style="color: var(--info-blue);">0</span></td>
                            <td><span style="color: var(--danger-red);">5</span></td>
                            <td><strong style="color: #059669;">91.2%</strong></td>
                        </tr>
                        <tr>
                            <td><strong>XI IPA 1</strong></td>
                            <td>Dewi Lestari</td>
                            <td>36</td>
                            <td><span style="color: var(--success-green); font-weight: 600;">175</span></td>
                            <td><span style="color: var(--warning-yellow);">0</span></td>
                            <td><span style="color: var(--info-blue);">0</span></td>
                            <td><span style="color: var(--danger-red);">5</span></td>
                            <td><strong style="color: var(--success-green);">97.2%</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
