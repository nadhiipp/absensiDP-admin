@extends('layouts.app')

@section('title', 'Data Kelas')

@push('styles')
    <style>
        .kelas-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        /* Filter Tabs */
        .filter-tabs-kelas {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 0;
        }

        .filter-tab-kelas {
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-gray);
            cursor: pointer;
            transition: all 0.2s ease;
            border-bottom: 2px solid transparent;
            margin-bottom: -2px;
            position: relative;
        }

        .filter-tab-kelas:hover {
            color: var(--primary-blue);
        }

        .filter-tab-kelas.active {
            color: var(--primary-blue);
            border-bottom-color: var(--primary-blue);
        }

        .filter-tab-kelas .count {
            display: inline-block;
            margin-left: 8px;
            padding: 2px 8px;
            background: var(--bg-main);
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
        }

        .filter-tab-kelas.active .count {
            background: rgba(76, 111, 255, 0.1);
            color: var(--primary-blue);
        }

        /* Stats Banner */
        .stats-banner {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-banner-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-banner-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .stat-banner-info {
            flex: 1;
        }

        .stat-banner-label {
            font-size: 12px;
            color: var(--text-gray);
            font-weight: 500;
            margin-bottom: 4px;
        }

        .stat-banner-value {
            font-size: 24px;
            font-weight: 800;
            color: var(--text-dark);
        }

        /* Kelas Grid */
        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .kelas-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .kelas-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
            border-color: var(--primary-blue);
        }

        .kelas-card-header {
            padding: 24px;
            background: linear-gradient(135deg, #4C6FFF, #3451E8);
            position: relative;
            overflow: hidden;
        }

        .kelas-card-header.blue {
            background: linear-gradient(135deg, #4C6FFF, #3451E8);
        }

        .kelas-card-header.green {
            background: linear-gradient(135deg, #10B981, #059669);
        }

        .kelas-card-header.yellow {
            background: linear-gradient(135deg, #F59E0B, #D97706);
        }

        .kelas-card-header.red {
            background: linear-gradient(135deg, #EF4444, #DC2626);
        }

        .kelas-card-header.purple {
            background: linear-gradient(135deg, #8B5CF6, #7C3AED);
        }

        .kelas-card-header.pink {
            background: linear-gradient(135deg, #EC4899, #DB2777);
        }

        .kelas-card-header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .kelas-card-header::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .kelas-code {
            font-size: 32px;
            font-weight: 800;
            color: white;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .kelas-name {
            font-size: 16px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            position: relative;
            z-index: 1;
        }

        .kelas-card-body {
            padding: 24px;
        }

        .kelas-info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        .kelas-info-row:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .kelas-info-label {
            font-size: 13px;
            color: var(--text-gray);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .kelas-info-label i {
            width: 16px;
            text-align: center;
            font-size: 12px;
            color: var(--text-light);
        }

        .kelas-info-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .kelas-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .kelas-stat-item {
            text-align: center;
        }

        .kelas-stat-value {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .kelas-stat-label {
            font-size: 11px;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .kelas-percentage {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
        }

        .percentage-label-mini {
            font-size: 12px;
            color: var(--text-gray);
            font-weight: 500;
        }

        .percentage-bar-mini {
            flex: 1;
            height: 6px;
            background: #E5E7EB;
            border-radius: 10px;
            overflow: hidden;
        }

        .percentage-fill-mini {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        .percentage-value-mini {
            font-size: 13px;
            font-weight: 700;
        }

        .kelas-card-footer {
            padding: 16px 24px;
            background: var(--bg-main);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-detail-kelas {
            flex: 1;
            padding: 10px 16px;
            background: white;
            color: var(--text-dark);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-detail-kelas:hover {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
        }

        .kelas-actions {
            display: flex;
            gap: 8px;
            margin-left: 12px;
        }

        .btn-icon-kelas {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--text-gray);
            font-size: 13px;
        }

        .btn-icon-kelas:hover {
            background: var(--bg-main);
        }

        .btn-icon-kelas.edit:hover {
            border-color: var(--warning-yellow);
            color: var(--warning-yellow);
        }

        .btn-icon-kelas.delete:hover {
            border-color: var(--danger-red);
            color: var(--danger-red);
        }

        @media (max-width: 1400px) {
            .kelas-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 1200px) {
            .stats-banner {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .kelas-header {
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }

            .header-actions {
                flex-direction: column;
            }

            .stats-banner {
                grid-template-columns: 1fr;
            }

            .kelas-grid {
                grid-template-columns: 1fr;
            }

            .filter-tabs-kelas {
                overflow-x: auto;
                padding-bottom: 0;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Data Kelas</h1>
        <p class="page-subtitle">Kelola data kelas dan monitor kehadiran per kelas</p>
    </div>

    <div class="kelas-header">
        <div></div>
        <div class="header-actions">
            <button class="btn-secondary">
                <i class="fas fa-download"></i>
                Export Data
            </button>
            <button class="btn-add">
                <i class="fas fa-plus"></i>
                Tambah Kelas
            </button>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="filter-tabs-kelas">
        <div class="filter-tab-kelas active">
            Semua Kelas
            <span class="count">24</span>
        </div>
        <div class="filter-tab-kelas">
            Kelas X
            <span class="count">8</span>
        </div>
        <div class="filter-tab-kelas">
            Kelas XI
            <span class="count">8</span>
        </div>
        <div class="filter-tab-kelas">
            Kelas XII
            <span class="count">8</span>
        </div>
    </div>

    <!-- Stats Banner -->
    <div class="stats-banner">
        <div class="stat-banner-card">
            <div class="stat-banner-icon" style="background: rgba(76, 111, 255, 0.1); color: var(--primary-blue);">
                <i class="fas fa-door-open"></i>
            </div>
            <div class="stat-banner-info">
                <div class="stat-banner-label">Total Kelas</div>
                <div class="stat-banner-value">24</div>
            </div>
        </div>

        <div class="stat-banner-card">
            <div class="stat-banner-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--success-green);">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-banner-info">
                <div class="stat-banner-label">Total Siswa</div>
                <div class="stat-banner-value">847</div>
            </div>
        </div>

        <div class="stat-banner-card">
            <div class="stat-banner-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--warning-yellow);">
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="stat-banner-info">
                <div class="stat-banner-label">Wali Kelas</div>
                <div class="stat-banner-value">24</div>
            </div>
        </div>

        <div class="stat-banner-card">
            <div class="stat-banner-icon" style="background: rgba(59, 130, 246, 0.1); color: var(--info-blue);">
                <i class="fas fa-percentage"></i>
            </div>
            <div class="stat-banner-info">
                <div class="stat-banner-label">Rata-rata Kehadiran</div>
                <div class="stat-banner-value">93.2%</div>
            </div>
        </div>
    </div>

    <!-- Kelas Grid -->
    <div class="kelas-grid">
        <!-- Kelas Card 1 -->
        <div class="kelas-card">
            <div class="kelas-card-header blue">
                <div class="kelas-code">X IPA 1</div>
                <div class="kelas-name">Kelas 10 • IPA</div>
            </div>
            <div class="kelas-card-body">
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-user-tie"></i>
                        Wali Kelas
                    </div>
                    <div class="kelas-info-value">Siti Nurhaliza</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-users"></i>
                        Jumlah Siswa
                    </div>
                    <div class="kelas-info-value">36 Siswa</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-calendar-alt"></i>
                        Tahun Ajaran
                    </div>
                    <div class="kelas-info-value">2025/2026</div>
                </div>

                <div class="kelas-stats">
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--success-green);">34</div>
                        <div class="kelas-stat-label">Hadir</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--warning-yellow);">1</div>
                        <div class="kelas-stat-label">Izin/Sakit</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--danger-red);">1</div>
                        <div class="kelas-stat-label">Alpha</div>
                    </div>
                </div>

                <div class="kelas-percentage">
                    <span class="percentage-label-mini">Kehadiran:</span>
                    <div class="percentage-bar-mini">
                        <div class="percentage-fill-mini"
                            style="background: linear-gradient(90deg, var(--success-green), #34D399); width: 94%;"></div>
                    </div>
                    <span class="percentage-value-mini" style="color: var(--success-green);">94%</span>
                </div>
            </div>
            <div class="kelas-card-footer">
                <button class="btn-detail-kelas">
                    <i class="fas fa-eye"></i>
                    Lihat Detail
                </button>
                <div class="kelas-actions">
                    <button class="btn-icon-kelas edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon-kelas delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Kelas Card 2 -->
        <div class="kelas-card">
            <div class="kelas-card-header green">
                <div class="kelas-code">X IPA 2</div>
                <div class="kelas-name">Kelas 10 • IPA</div>
            </div>
            <div class="kelas-card-body">
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-user-tie"></i>
                        Wali Kelas
                    </div>
                    <div class="kelas-info-value">Ahmad Firdaus</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-users"></i>
                        Jumlah Siswa
                    </div>
                    <div class="kelas-info-value">35 Siswa</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-calendar-alt"></i>
                        Tahun Ajaran
                    </div>
                    <div class="kelas-info-value">2025/2026</div>
                </div>

                <div class="kelas-stats">
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--success-green);">33</div>
                        <div class="kelas-stat-label">Hadir</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--warning-yellow);">2</div>
                        <div class="kelas-stat-label">Izin/Sakit</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--danger-red);">0</div>
                        <div class="kelas-stat-label">Alpha</div>
                    </div>
                </div>

                <div class="kelas-percentage">
                    <span class="percentage-label-mini">Kehadiran:</span>
                    <div class="percentage-bar-mini">
                        <div class="percentage-fill-mini"
                            style="background: linear-gradient(90deg, var(--success-green), #34D399); width: 94%;"></div>
                    </div>
                    <span class="percentage-value-mini" style="color: var(--success-green);">94%</span>
                </div>
            </div>
            <div class="kelas-card-footer">
                <button class="btn-detail-kelas">
                    <i class="fas fa-eye"></i>
                    Lihat Detail
                </button>
                <div class="kelas-actions">
                    <button class="btn-icon-kelas edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon-kelas delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Kelas Card 3 -->
        <div class="kelas-card">
            <div class="kelas-card-header yellow">
                <div class="kelas-code">X IPS 1</div>
                <div class="kelas-name">Kelas 10 • IPS</div>
            </div>
            <div class="kelas-card-body">
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-user-tie"></i>
                        Wali Kelas
                    </div>
                    <div class="kelas-info-value">Budi Santoso</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-users"></i>
                        Jumlah Siswa
                    </div>
                    <div class="kelas-info-value">34 Siswa</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-calendar-alt"></i>
                        Tahun Ajaran
                    </div>
                    <div class="kelas-info-value">2025/2026</div>
                </div>

                <div class="kelas-stats">
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--success-green);">31</div>
                        <div class="kelas-stat-label">Hadir</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--warning-yellow);">2</div>
                        <div class="kelas-stat-label">Izin/Sakit</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--danger-red);">1</div>
                        <div class="kelas-stat-label">Alpha</div>
                    </div>
                </div>

                <div class="kelas-percentage">
                    <span class="percentage-label-mini">Kehadiran:</span>
                    <div class="percentage-bar-mini">
                        <div class="percentage-fill-mini"
                            style="background: linear-gradient(90deg, #10B981, #34D399); width: 91%;"></div>
                    </div>
                    <span class="percentage-value-mini" style="color: #059669;">91%</span>
                </div>
            </div>
            <div class="kelas-card-footer">
                <button class="btn-detail-kelas">
                    <i class="fas fa-eye"></i>
                    Lihat Detail
                </button>
                <div class="kelas-actions">
                    <button class="btn-icon-kelas edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon-kelas delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Kelas Card 4 -->
        <div class="kelas-card">
            <div class="kelas-card-header red">
                <div class="kelas-code">XI IPA 1</div>
                <div class="kelas-name">Kelas 11 • IPA</div>
            </div>
            <div class="kelas-card-body">
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-user-tie"></i>
                        Wali Kelas
                    </div>
                    <div class="kelas-info-value">Dewi Lestari</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-users"></i>
                        Jumlah Siswa
                    </div>
                    <div class="kelas-info-value">36 Siswa</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-calendar-alt"></i>
                        Tahun Ajaran
                    </div>
                    <div class="kelas-info-value">2025/2026</div>
                </div>

                <div class="kelas-stats">
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--success-green);">35</div>
                        <div class="kelas-stat-label">Hadir</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--warning-yellow);">0</div>
                        <div class="kelas-stat-label">Izin/Sakit</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--danger-red);">1</div>
                        <div class="kelas-stat-label">Alpha</div>
                    </div>
                </div>

                <div class="kelas-percentage">
                    <span class="percentage-label-mini">Kehadiran:</span>
                    <div class="percentage-bar-mini">
                        <div class="percentage-fill-mini"
                            style="background: linear-gradient(90deg, var(--success-green), #34D399); width: 97%;"></div>
                    </div>
                    <span class="percentage-value-mini" style="color: var(--success-green);">97%</span>
                </div>
            </div>
            <div class="kelas-card-footer">
                <button class="btn-detail-kelas">
                    <i class="fas fa-eye"></i>
                    Lihat Detail
                </button>
                <div class="kelas-actions">
                    <button class="btn-icon-kelas edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon-kelas delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Kelas Card 5 -->
        <div class="kelas-card">
            <div class="kelas-card-header purple">
                <div class="kelas-code">XI IPA 2</div>
                <div class="kelas-name">Kelas 11 • IPA</div>
            </div>
            <div class="kelas-card-body">
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-user-tie"></i>
                        Wali Kelas
                    </div>
                    <div class="kelas-info-value">Rina Kurnia</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-users"></i>
                        Jumlah Siswa
                    </div>
                    <div class="kelas-info-value">36 Siswa</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-calendar-alt"></i>
                        Tahun Ajaran
                    </div>
                    <div class="kelas-info-value">2025/2026</div>
                </div>

                <div class="kelas-stats">
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--success-green);">34</div>
                        <div class="kelas-stat-label">Hadir</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--warning-yellow);">1</div>
                        <div class="kelas-stat-label">Izin/Sakit</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--danger-red);">1</div>
                        <div class="kelas-stat-label">Alpha</div>
                    </div>
                </div>

                <div class="kelas-percentage">
                    <span class="percentage-label-mini">Kehadiran:</span>
                    <div class="percentage-bar-mini">
                        <div class="percentage-fill-mini"
                            style="background: linear-gradient(90deg, var(--success-green), #34D399); width: 94%;"></div>
                    </div>
                    <span class="percentage-value-mini" style="color: var(--success-green);">94%</span>
                </div>
            </div>
            <div class="kelas-card-footer">
                <button class="btn-detail-kelas">
                    <i class="fas fa-eye"></i>
                    Lihat Detail
                </button>
                <div class="kelas-actions">
                    <button class="btn-icon-kelas edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon-kelas delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Kelas Card 6 -->
        <div class="kelas-card">
            <div class="kelas-card-header pink">
                <div class="kelas-code">XI IPS 1</div>
                <div class="kelas-name">Kelas 11 • IPS</div>
            </div>
            <div class="kelas-card-body">
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-user-tie"></i>
                        Wali Kelas
                    </div>
                    <div class="kelas-info-value">Agus Salim</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-users"></i>
                        Jumlah Siswa
                    </div>
                    <div class="kelas-info-value">35 Siswa</div>
                </div>
                <div class="kelas-info-row">
                    <div class="kelas-info-label">
                        <i class="fas fa-calendar-alt"></i>
                        Tahun Ajaran
                    </div>
                    <div class="kelas-info-value">2025/2026</div>
                </div>

                <div class="kelas-stats">
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--success-green);">32</div>
                        <div class="kelas-stat-label">Hadir</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--warning-yellow);">2</div>
                        <div class="kelas-stat-label">Izin/Sakit</div>
                    </div>
                    <div class="kelas-stat-item">
                        <div class="kelas-stat-value" style="color: var(--danger-red);">1</div>
                        <div class="kelas-stat-label">Alpha</div>
                    </div>
                </div>

                <div class="kelas-percentage">
                    <span class="percentage-label-mini">Kehadiran:</span>
                    <div class="percentage-bar-mini">
                        <div class="percentage-fill-mini"
                            style="background: linear-gradient(90deg, #10B981, #34D399); width: 91%;"></div>
                    </div>
                    <span class="percentage-value-mini" style="color: #059669;">91%</span>
                </div>
            </div>
            <div class="kelas-card-footer">
                <button class="btn-detail-kelas">
                    <i class="fas fa-eye"></i>
                    Lihat Detail
                </button>
                <div class="kelas-actions">
                    <button class="btn-icon-kelas edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon-kelas delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
