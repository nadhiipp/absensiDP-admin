@extends('layouts.app')

@section('title', 'Dashboard Absensi')

@push('styles')
    <style>
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            opacity: 0.05;
            border-radius: 50%;
        }

        .stat-card.blue::before {
            background: var(--primary-blue);
            right: -20px;
            top: -20px;
        }

        .stat-card.green::before {
            background: var(--success-green);
            right: -20px;
            top: -20px;
        }

        .stat-card.yellow::before {
            background: var(--warning-yellow);
            right: -20px;
            top: -20px;
        }

        .stat-card.red::before {
            background: var(--danger-red);
            right: -20px;
            top: -20px;
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--text-gray);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-icon.blue {
            background: rgba(76, 111, 255, 0.1);
            color: var(--primary-blue);
        }

        .stat-icon.green {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-green);
        }

        .stat-icon.yellow {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-yellow);
        }

        .stat-icon.red {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-red);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1;
        }

        .stat-description {
            font-size: 13px;
            color: var(--text-gray);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .stat-trend {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .stat-trend.up {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-green);
        }

        .stat-trend.down {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-red);
        }

        /* Chart Section */
        .chart-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 28px;
        }

        .chart-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid var(--border-color);
        }

        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .chart-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .chart-subtitle {
            font-size: 13px;
            color: var(--text-gray);
            margin-top: 2px;
        }

        .chart-empty {
            height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
        }

        .chart-empty i {
            font-size: 48px;
            margin-bottom: 12px;
            opacity: 0.3;
        }

        /* Table Section */
        .table-section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid var(--border-color);
            margin-bottom: 28px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .view-all-link {
            font-size: 14px;
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .view-all-link:hover {
            color: var(--primary-blue-dark);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead {
            background: var(--bg-main);
        }

        .data-table th {
            padding: 12px 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        .data-table td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
            color: var(--text-dark);
        }

        .data-table tbody tr {
            transition: all 0.2s ease;
        }

        .data-table tbody tr:hover {
            background: #F9FAFB;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 13px;
        }

        .student-details {
            display: flex;
            flex-direction: column;
        }

        .student-name {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 2px;
        }

        .student-class {
            font-size: 12px;
            color: var(--text-gray);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-badge.hadir {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-green);
        }

        .status-badge.izin {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-yellow);
        }

        .status-badge.sakit {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info-blue);
        }

        .status-badge.alpha {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-red);
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .progress-bar-container {
            width: 100%;
            height: 8px;
            background: #E5E7EB;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        .progress-bar.green {
            background: linear-gradient(90deg, var(--success-green), #34D399);
        }

        .progress-bar.yellow {
            background: linear-gradient(90deg, var(--warning-yellow), #FBBF24);
        }

        .progress-bar.red {
            background: linear-gradient(90deg, var(--danger-red), #F87171);
        }

        .action-button {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid var(--border-color);
            background: white;
            color: var(--text-gray);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .action-button:hover {
            background: var(--bg-main);
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        /* Activity Feed */
        .activity-feed {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid var(--border-color);
        }

        .activity-item {
            display: flex;
            gap: 12px;
            padding: 16px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .activity-icon.blue {
            background: rgba(76, 111, 255, 0.1);
            color: var(--primary-blue);
        }

        .activity-icon.green {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-green);
        }

        .activity-icon.yellow {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-yellow);
        }

        .activity-icon.red {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-red);
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 4px;
            font-size: 14px;
        }

        .activity-description {
            font-size: 13px;
            color: var(--text-gray);
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 12px;
            color: var(--text-light);
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .chart-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Dashboard Absensi</h1>
        <p class="page-subtitle">Senin, 05 Januari 2026 • Semester Genap 2025/2026</p>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card blue">
            <div class="stat-header">
                <div class="stat-label">Total Siswa</div>
                <div class="stat-icon blue">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="stat-value">847</div>
            <div class="stat-description">
                <span class="stat-trend up">
                    <i class="fas fa-arrow-up"></i>
                    Seluruh siswa
                </span>
            </div>
        </div>

        <div class="stat-card green">
            <div class="stat-header">
                <div class="stat-label">Hadir Hari Ini</div>
                <div class="stat-icon green">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="stat-value">789</div>
            <div class="stat-description">
                <span class="stat-trend up">
                    <i class="fas fa-arrow-up"></i>
                    93.2% kehadiran
                </span>
            </div>
        </div>

        <div class="stat-card yellow">
            <div class="stat-header">
                <div class="stat-label">Izin & Sakit</div>
                <div class="stat-icon yellow">
                    <i class="fas fa-file-medical"></i>
                </div>
            </div>
            <div class="stat-value">42</div>
            <div class="stat-description">
                <span class="stat-trend down">
                    <i class="fas fa-arrow-down"></i>
                    5.0% siswa
                </span>
            </div>
        </div>

        <div class="stat-card red">
            <div class="stat-header">
                <div class="stat-label">Tidak Hadir</div>
                <div class="stat-icon red">
                    <i class="fas fa-times-circle"></i>
                </div>
            </div>
            <div class="stat-value">16</div>
            <div class="stat-description">
                <span class="stat-trend down">
                    <i class="fas fa-arrow-down"></i>
                    1.8% siswa
                </span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="chart-section">
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-title">Grafik Kehadiran Minggu Ini</div>
                    <div class="chart-subtitle">Senin - Jumat, 31 Des - 05 Jan</div>
                </div>
            </div>
            <div class="chart-empty">
                <i class="fas fa-chart-line"></i>
                <div>Grafik akan muncul di sini</div>
            </div>
        </div>

        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-title">Status Absensi Hari Ini</div>
                    <div class="chart-subtitle">Senin, 05 Januari 2026</div>
                </div>
            </div>
            <div class="chart-empty">
                <i class="fas fa-chart-pie"></i>
                <div>Grafik akan muncul di sini</div>
            </div>
        </div>
    </div>

    <!-- Attendance Per Class Table -->
    <div class="table-section">
        <div class="section-header">
            <div class="section-title">Absensi Per Kelas Hari Ini</div>
            <a href="#" class="view-all-link">Lihat Semua →</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Total Siswa</th>
                    <th>Hadir</th>
                    <th>Izin/Sakit</th>
                    <th>Alpha</th>
                    <th>Persentase</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="student-info">
                            <div class="student-avatar" style="background: linear-gradient(135deg, #4C6FFF, #3451E8);">
                                X-1
                            </div>
                            <div class="student-details">
                                <div class="student-name">X IPA 1</div>
                                <div class="student-class">Kelas 10 • IPA</div>
                            </div>
                        </div>
                    </td>
                    <td>Siti Nurhaliza</td>
                    <td>36</td>
                    <td><span class="status-badge hadir"><span class="status-dot"></span> 34</span></td>
                    <td>1</td>
                    <td>1</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="progress-bar-container" style="flex: 1;">
                                <div class="progress-bar green" style="width: 94%"></div>
                            </div>
                            <span style="font-weight: 600; color: var(--success-green); font-size: 13px;">94%</span>
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
                        <div class="student-info">
                            <div class="student-avatar" style="background: linear-gradient(135deg, #10B981, #059669);">
                                X-2
                            </div>
                            <div class="student-details">
                                <div class="student-name">X IPA 2</div>
                                <div class="student-class">Kelas 10 • IPA</div>
                            </div>
                        </div>
                    </td>
                    <td>Ahmad Firdaus</td>
                    <td>35</td>
                    <td><span class="status-badge hadir"><span class="status-dot"></span> 33</span></td>
                    <td>2</td>
                    <td>0</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="progress-bar-container" style="flex: 1;">
                                <div class="progress-bar green" style="width: 94%"></div>
                            </div>
                            <span style="font-weight: 600; color: var(--success-green); font-size: 13px;">94%</span>
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
                        <div class="student-info">
                            <div class="student-avatar" style="background: linear-gradient(135deg, #F59E0B, #D97706);">
                                X-3
                            </div>
                            <div class="student-details">
                                <div class="student-name">X IPS 1</div>
                                <div class="student-class">Kelas 10 • IPS</div>
                            </div>
                        </div>
                    </td>
                    <td>Budi Santoso</td>
                    <td>34</td>
                    <td><span class="status-badge hadir"><span class="status-dot"></span> 31</span></td>
                    <td>2</td>
                    <td>1</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="progress-bar-container" style="flex: 1;">
                                <div class="progress-bar yellow" style="width: 91%"></div>
                            </div>
                            <span style="font-weight: 600; color: var(--warning-yellow); font-size: 13px;">91%</span>
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
                        <div class="student-info">
                            <div class="student-avatar" style="background: linear-gradient(135deg, #EF4444, #DC2626);">
                                XI-1
                            </div>
                            <div class="student-details">
                                <div class="student-name">XI IPA 1</div>
                                <div class="student-class">Kelas 11 • IPA</div>
                            </div>
                        </div>
                    </td>
                    <td>Dewi Lestari</td>
                    <td>36</td>
                    <td><span class="status-badge hadir"><span class="status-dot"></span> 35</span></td>
                    <td>0</td>
                    <td>1</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="progress-bar-container" style="flex: 1;">
                                <div class="progress-bar green" style="width: 97%"></div>
                            </div>
                            <span style="font-weight: 600; color: var(--success-green); font-size: 13px;">97%</span>
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
    </div>

    <!-- Activity Feed -->
    <div class="activity-feed">
        <div class="section-header" style="margin-bottom: 0; padding-bottom: 16px;">
            <div class="section-title">Aktivitas Terbaru</div>
        </div>

        <div class="activity-item">
            <div class="activity-icon green">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="activity-content">
                <div class="activity-title">Andi Prasetyo melakukan absen hadir</div>
                <div class="activity-description">X IPA 1 • 07:15:30</div>
                <div class="activity-time">5 menit yang lalu</div>
            </div>
        </div>

        <div class="activity-item">
            <div class="activity-icon yellow">
                <i class="fas fa-file-medical"></i>
            </div>
            <div class="activity-content">
                <div class="activity-title">Siti Rahma mengajukan izin sakit</div>
                <div class="activity-description">X IPA 2 • Menunggu persetujuan wali kelas</div>
                <div class="activity-time">15 menit yang lalu</div>
            </div>
        </div>

        <div class="activity-item">
            <div class="activity-icon blue">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="activity-content">
                <div class="activity-title">Bu Dewi merekap absensi kelas XI IPA 1</div>
                <div class="activity-description">Status: Selesai • 35 dari 36 siswa hadir</div>
                <div class="activity-time">30 menit yang lalu</div>
            </div>
        </div>

        <div class="activity-item">
            <div class="activity-icon red">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="activity-content">
                <div class="activity-title">Rafi Rahman tidak melakukan absensi</div>
                <div class="activity-description">X IPS 1 • Status: Alpha</div>
                <div class="activity-time">1 jam yang lalu</div>
            </div>
        </div>

        <div class="activity-item">
            <div class="activity-icon green">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="activity-content">
                <div class="activity-title">Sistem berhasil merekap absensi harian</div>
                <div class="activity-description">Total: 789 siswa hadir dari 847 siswa</div>
                <div class="activity-time">2 jam yang lalu</div>
            </div>
        </div>
    </div>
@endsection
