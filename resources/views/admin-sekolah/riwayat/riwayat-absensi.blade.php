@extends('layouts.app')

@section('title', 'Riwayat Absensi')

@push('styles')
    <style>
        .date-filter-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            border: 1px solid var(--border-color);
            margin-bottom: 24px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .filter-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-field-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filter-field-label i {
            color: var(--text-light);
            font-size: 12px;
        }

        .date-input,
        .select-input {
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

        .date-input:focus,
        .select-input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(76, 111, 255, 0.1);
        }

        .filter-actions {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .btn-filter {
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

        .btn-filter:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(76, 111, 255, 0.3);
        }

        .btn-reset {
            padding: 12px 24px;
            background: white;
            color: var(--text-gray);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-reset:hover {
            background: var(--bg-main);
            border-color: var(--danger-red);
            color: var(--danger-red);
        }

        /* Summary Cards */
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .summary-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .summary-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            opacity: 0.05;
            border-radius: 50%;
            right: -15px;
            top: -15px;
        }

        .summary-card.green::before {
            background: var(--success-green);
        }

        .summary-card.yellow::before {
            background: var(--warning-yellow);
        }

        .summary-card.red::before {
            background: var(--danger-red);
        }

        .summary-card.blue::before {
            background: var(--info-blue);
        }

        .summary-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 16px;
        }

        .summary-label {
            font-size: 12px;
            color: var(--text-gray);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .summary-value {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .summary-percentage {
            font-size: 12px;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 6px;
            display: inline-block;
        }

        /* History Table */
        .history-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
        }

        .history-header {
            padding: 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .history-title-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .history-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .history-subtitle {
            font-size: 13px;
            color: var(--text-gray);
        }

        .history-actions {
            display: flex;
            gap: 12px;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-table thead {
            background: var(--bg-main);
        }

        .history-table th {
            padding: 14px 24px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        .history-table td {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
        }

        .history-table tbody tr {
            transition: all 0.2s ease;
        }

        .history-table tbody tr:hover {
            background: #F9FAFB;
        }

        .date-column {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .date-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--bg-main);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .date-day {
            font-size: 16px;
            font-weight: 700;
            color: var(--primary-blue);
            line-height: 1;
        }

        .date-month {
            font-size: 10px;
            font-weight: 600;
            color: var(--text-gray);
            text-transform: uppercase;
        }

        .date-info {
            display: flex;
            flex-direction: column;
        }

        .date-full {
            font-weight: 600;
            color: var(--text-dark);
        }

        .date-weekday {
            font-size: 12px;
            color: var(--text-gray);
            margin-top: 2px;
        }

        .stats-mini-inline {
            display: flex;
            gap: 8px;
        }

        .stat-mini-badge {
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .stat-mini-badge.green {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-green);
        }

        .stat-mini-badge.yellow {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-yellow);
        }

        .stat-mini-badge.red {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-red);
        }

        .percentage-display {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .percentage-bar {
            flex: 1;
            height: 8px;
            background: #E5E7EB;
            border-radius: 10px;
            overflow: hidden;
            max-width: 120px;
        }

        .percentage-fill {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        .percentage-fill.excellent {
            background: linear-gradient(90deg, var(--success-green), #34D399);
        }

        .percentage-fill.good {
            background: linear-gradient(90deg, #10B981, #34D399);
        }

        .percentage-fill.fair {
            background: linear-gradient(90deg, var(--warning-yellow), #FBBF24);
        }

        .percentage-fill.poor {
            background: linear-gradient(90deg, var(--danger-red), #F87171);
        }

        .percentage-text {
            font-weight: 700;
            font-size: 14px;
        }

        .percentage-text.excellent {
            color: var(--success-green);
        }

        .percentage-text.good {
            color: #059669;
        }

        .percentage-text.fair {
            color: var(--warning-yellow);
        }

        .percentage-text.poor {
            color: var(--danger-red);
        }

        .export-menu {
            position: relative;
        }

        .export-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            min-width: 180px;
            z-index: 100;
            display: none;
        }

        .export-dropdown.active {
            display: block;
        }

        .export-item {
            padding: 12px 16px;
            font-size: 14px;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .export-item:hover {
            background: var(--bg-main);
            color: var(--primary-blue);
        }

        .export-item:first-child {
            border-radius: 10px 10px 0 0;
        }

        .export-item:last-child {
            border-radius: 0 0 10px 10px;
        }

        .export-item i {
            width: 18px;
            text-align: center;
        }

        @media (max-width: 1200px) {
            .filter-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .summary-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .filter-grid {
                grid-template-columns: 1fr;
            }

            .summary-cards {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Riwayat Absensi</h1>
        <p class="page-subtitle">Data rekap absensi siswa berdasarkan periode tertentu</p>
    </div>

    <!-- Date Filter -->
    <div class="date-filter-card">
        <div class="filter-grid">
            <div class="filter-field">
                <label class="filter-field-label">
                    <i class="fas fa-calendar"></i>
                    Tanggal Awal
                </label>
                <input type="date" class="date-input" value="2025-01-01">
            </div>

            <div class="filter-field">
                <label class="filter-field-label">
                    <i class="fas fa-calendar"></i>
                    Tanggal Akhir
                </label>
                <input type="date" class="date-input" value="2026-01-05">
            </div>

            <div class="filter-field">
                <label class="filter-field-label">
                    <i class="fas fa-door-open"></i>
                    Kelas
                </label>
                <select class="select-input">
                    <option>Semua Kelas</option>
                    <option>X IPA 1</option>
                    <option>X IPA 2</option>
                    <option>X IPS 1</option>
                    <option>XI IPA 1</option>
                    <option>XI IPA 2</option>
                </select>
            </div>

            <div class="filter-field">
                <label class="filter-field-label">
                    <i class="fas fa-filter"></i>
                    Status
                </label>
                <select class="select-input">
                    <option>Semua Status</option>
                    <option>Hadir</option>
                    <option>Izin</option>
                    <option>Sakit</option>
                    <option>Alpha</option>
                </select>
            </div>
        </div>

        <div class="filter-actions">
            <button class="btn-filter">
                <i class="fas fa-search"></i>
                Tampilkan Data
            </button>
            <button class="btn-reset">
                <i class="fas fa-redo"></i>
                Reset Filter
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="summary-cards">
        <div class="summary-card green">
            <div class="summary-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--success-green);">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="summary-label">Total Hadir</div>
            <div class="summary-value">18,450</div>
            <span class="summary-percentage" style="background: rgba(16, 185, 129, 0.1); color: var(--success-green);">
                <i class="fas fa-arrow-up"></i> 93.2%
            </span>
        </div>

        <div class="summary-card yellow">
            <div class="summary-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--warning-yellow);">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="summary-label">Total Izin</div>
            <div class="summary-value">892</div>
            <span class="summary-percentage" style="background: rgba(245, 158, 11, 0.1); color: var(--warning-yellow);">
                <i class="fas fa-minus"></i> 4.5%
            </span>
        </div>

        <div class="summary-card red">
            <div class="summary-icon" style="background: rgba(239, 68, 68, 0.1); color: var(--danger-red);">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="summary-label">Total Alpha</div>
            <div class="summary-value">358</div>
            <span class="summary-percentage" style="background: rgba(239, 68, 68, 0.1); color: var(--danger-red);">
                <i class="fas fa-arrow-down"></i> 1.8%
            </span>
        </div>

        <div class="summary-card blue">
            <div class="summary-icon" style="background: rgba(59, 130, 246, 0.1); color: var(--info-blue);">
                <i class="fas fa-heartbeat"></i>
            </div>
            <div class="summary-label">Total Sakit</div>
            <div class="summary-value">105</div>
            <span class="summary-percentage" style="background: rgba(59, 130, 246, 0.1); color: var(--info-blue);">
                <i class="fas fa-minus"></i> 0.5%
            </span>
        </div>
    </div>

    <!-- History Table -->
    <div class="history-card">
        <div class="history-header">
            <div class="history-title-group">
                <div class="history-title">Rekap Absensi Harian</div>
                <div class="history-subtitle">Data absensi dari 01 Jan 2025 - 05 Jan 2026</div>
            </div>
            <div class="history-actions">
                <div class="export-menu">
                    <button class="btn-secondary" onclick="toggleExportMenu()">
                        <i class="fas fa-download"></i>
                        Export Data
                    </button>
                    <div class="export-dropdown" id="exportDropdown">
                        <div class="export-item">
                            <i class="fas fa-file-excel"></i>
                            Export ke Excel
                        </div>
                        <div class="export-item">
                            <i class="fas fa-file-pdf"></i>
                            Export ke PDF
                        </div>
                        <div class="export-item">
                            <i class="fas fa-file-csv"></i>
                            Export ke CSV
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="history-table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kelas</th>
                    <th>Total Siswa</th>
                    <th>Hadir</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                    <th>Alpha</th>
                    <th>Kehadiran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="date-column">
                            <div class="date-icon">
                                <div class="date-day">05</div>
                                <div class="date-month">JAN</div>
                            </div>
                            <div class="date-info">
                                <div class="date-full">05 Januari 2026</div>
                                <div class="date-weekday">Senin</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600;">X IPA 1</div>
                        <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 10 • IPA</div>
                    </td>
                    <td>
                        <span style="font-weight: 700;">36</span>
                        <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">siswa</div>
                    </td>
                    <td>
                        <span class="stat-mini-badge green">
                            <i class="fas fa-check"></i>
                            34
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge yellow">
                            1
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge yellow">
                            0
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge red">
                            1
                        </span>
                    </td>
                    <td>
                        <div class="percentage-display">
                            <div class="percentage-bar">
                                <div class="percentage-fill excellent" style="width: 94%;"></div>
                            </div>
                            <span class="percentage-text excellent">94%</span>
                        </div>
                    </td>
                    <td>
                        <button class="action-button">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="date-column">
                            <div class="date-icon">
                                <div class="date-day">05</div>
                                <div class="date-month">JAN</div>
                            </div>
                            <div class="date-info">
                                <div class="date-full">05 Januari 2026</div>
                                <div class="date-weekday">Senin</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600;">X IPA 2</div>
                        <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 10 • IPA</div>
                    </td>
                    <td>
                        <span style="font-weight: 700;">35</span>
                        <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">siswa</div>
                    </td>
                    <td>
                        <span class="stat-mini-badge green">
                            <i class="fas fa-check"></i>
                            33
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge yellow">
                            2
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge yellow">
                            0
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge red">
                            0
                        </span>
                    </td>
                    <td>
                        <div class="percentage-display">
                            <div class="percentage-bar">
                                <div class="percentage-fill excellent" style="width: 94%;"></div>
                            </div>
                            <span class="percentage-text excellent">94%</span>
                        </div>
                    </td>
                    <td>
                        <button class="action-button">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="date-column">
                            <div class="date-icon">
                                <div class="date-day">04</div>
                                <div class="date-month">JAN</div>
                            </div>
                            <div class="date-info">
                                <div class="date-full">04 Januari 2026</div>
                                <div class="date-weekday">Minggu</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600;">X IPS 1</div>
                        <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 10 • IPS</div>
                    </td>
                    <td>
                        <span style="font-weight: 700;">34</span>
                        <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">siswa</div>
                    </td>
                    <td>
                        <span class="stat-mini-badge green">
                            <i class="fas fa-check"></i>
                            31
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge yellow">
                            2
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge yellow">
                            0
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge red">
                            1
                        </span>
                    </td>
                    <td>
                        <div class="percentage-display">
                            <div class="percentage-bar">
                                <div class="percentage-fill good" style="width: 91%;"></div>
                            </div>
                            <span class="percentage-text good">91%</span>
                        </div>
                    </td>
                    <td>
                        <button class="action-button">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="date-column">
                            <div class="date-icon">
                                <div class="date-day">03</div>
                                <div class="date-month">JAN</div>
                            </div>
                            <div class="date-info">
                                <div class="date-full">03 Januari 2026</div>
                                <div class="date-weekday">Sabtu</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600;">XI IPA 1</div>
                        <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 11 • IPA</div>
                    </td>
                    <td>
                        <span style="font-weight: 700;">36</span>
                        <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">siswa</div>
                    </td>
                    <td>
                        <span class="stat-mini-badge green">
                            <i class="fas fa-check"></i>
                            35
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge yellow">
                            0
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge yellow">
                            0
                        </span>
                    </td>
                    <td>
                        <span class="stat-mini-badge red">
                            1
                        </span>
                    </td>
                    <td>
                        <div class="percentage-display">
                            <div class="percentage-bar">
                                <div class="percentage-fill excellent" style="width: 97%;"></div>
                            </div>
                            <span class="percentage-text excellent">97%</span>
                        </div>
                    </td>
                    <td>
                        <button class="action-button">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="pagination">
            <div class="pagination-info">
                Menampilkan 1-4 dari 120 data
            </div>
            <div class="pagination-buttons">
                <button class="pagination-btn" disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn">2</button>
                <button class="pagination-btn">3</button>
                <button class="pagination-btn">...</button>
                <button class="pagination-btn">30</button>
                <button class="pagination-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleExportMenu() {
            const dropdown = document.getElementById('exportDropdown');
            dropdown.classList.toggle('active');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const exportMenu = document.querySelector('.export-menu');
            const dropdown = document.getElementById('exportDropdown');

            if (!exportMenu.contains(event.target)) {
                dropdown.classList.remove('active');
            }
        });
    </script>
@endpush
