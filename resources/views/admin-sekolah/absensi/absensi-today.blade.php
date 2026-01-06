    @extends('layouts.app')

    @section('title', 'Absensi Hari Ini')

    @push('styles')
        <style>
            .page-actions {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 24px;
            }

            .button-group {
                display: flex;
                gap: 12px;
            }

            .btn-primary {
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
                gap: 8px;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 16px rgba(76, 111, 255, 0.3);
            }

            .btn-secondary {
                padding: 12px 24px;
                background: white;
                color: var(--text-dark);
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

            .btn-secondary:hover {
                background: var(--bg-main);
                border-color: var(--primary-blue);
                color: var(--primary-blue);
            }

            /* Stats Mini */
            .stats-mini {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 16px;
                margin-bottom: 24px;
            }

            .stat-mini-card {
                background: white;
                border-radius: 12px;
                padding: 20px;
                border: 1px solid var(--border-color);
                display: flex;
                align-items: center;
                gap: 16px;
            }

            .stat-mini-icon {
                width: 48px;
                height: 48px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                flex-shrink: 0;
            }

            .stat-mini-content {
                flex: 1;
            }

            .stat-mini-label {
                font-size: 13px;
                color: var(--text-gray);
                margin-bottom: 4px;
            }

            .stat-mini-value {
                font-size: 24px;
                font-weight: 800;
                color: var(--text-dark);
            }

            .stat-mini-subtitle {
                font-size: 12px;
                color: var(--text-gray);
                margin-top: 2px;
            }

            /* Filter Bar */
            .filter-bar {
                background: white;
                border-radius: 12px;
                padding: 16px 20px;
                border: 1px solid var(--border-color);
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                gap: 16px;
            }

            .filter-item {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .filter-label {
                font-size: 12px;
                font-weight: 600;
                color: var(--text-gray);
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .filter-select {
                padding: 8px 12px;
                border: 1px solid var(--border-color);
                border-radius: 8px;
                font-size: 14px;
                color: var(--text-dark);
                background: white;
                outline: none;
                cursor: pointer;
                min-width: 150px;
            }

            .filter-select:focus {
                border-color: var(--primary-blue);
            }

            .filter-tabs {
                display: flex;
                gap: 8px;
                margin-left: auto;
            }

            .filter-tab {
                padding: 8px 16px;
                border-radius: 8px;
                font-size: 13px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s ease;
                border: 1px solid transparent;
            }

            .filter-tab:hover {
                background: var(--bg-main);
            }

            .filter-tab.active {
                background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
                color: var(--primary-blue);
                border-color: rgba(76, 111, 255, 0.2);
            }

            /* Student List */
            .student-list {
                background: white;
                border-radius: 12px;
                border: 1px solid var(--border-color);
            }

            .student-list-header {
                padding: 20px 24px;
                border-bottom: 1px solid var(--border-color);
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .list-title {
                font-size: 16px;
                font-weight: 700;
                color: var(--text-dark);
            }

            .list-subtitle {
                font-size: 13px;
                color: var(--text-gray);
                margin-top: 2px;
            }

            .list-actions {
                display: flex;
                gap: 12px;
            }

            .student-table {
                width: 100%;
                border-collapse: collapse;
            }

            .student-table thead {
                background: var(--bg-main);
            }

            .student-table th {
                padding: 14px 24px;
                text-align: left;
                font-size: 12px;
                font-weight: 700;
                color: var(--text-gray);
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border-bottom: 1px solid var(--border-color);
            }

            .student-table td {
                padding: 20px 24px;
                border-bottom: 1px solid var(--border-color);
                font-size: 14px;
            }

            .student-table tbody tr {
                transition: all 0.2s ease;
            }

            .student-table tbody tr:hover {
                background: #F9FAFB;
            }

            .student-profile {
                display: flex;
                align-items: center;
                gap: 14px;
            }

            .student-photo {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-weight: 700;
                font-size: 16px;
                flex-shrink: 0;
            }

            .student-data {
                display: flex;
                flex-direction: column;
            }

            .student-nis {
                font-size: 11px;
                color: var(--text-light);
                margin-bottom: 3px;
                font-weight: 600;
            }

            .student-fullname {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 3px;
            }

            .student-meta {
                font-size: 12px;
                color: var(--text-gray);
            }

            .status-select {
                padding: 8px 12px;
                border: 1px solid var(--border-color);
                border-radius: 8px;
                font-size: 13px;
                font-weight: 600;
                cursor: pointer;
                outline: none;
                min-width: 120px;
            }

            .status-select.hadir {
                background: rgba(16, 185, 129, 0.1);
                color: var(--success-green);
                border-color: rgba(16, 185, 129, 0.3);
            }

            .status-select.izin {
                background: rgba(245, 158, 11, 0.1);
                color: var(--warning-yellow);
                border-color: rgba(245, 158, 11, 0.3);
            }

            .status-select.sakit {
                background: rgba(59, 130, 246, 0.1);
                color: var(--info-blue);
                border-color: rgba(59, 130, 246, 0.3);
            }

            .status-select.alpha {
                background: rgba(239, 68, 68, 0.1);
                color: var(--danger-red);
                border-color: rgba(239, 68, 68, 0.3);
            }

            .status-select.belum {
                background: rgba(156, 163, 175, 0.1);
                color: var(--text-gray);
                border-color: rgba(156, 163, 175, 0.3);
            }

            .time-badge {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 6px 12px;
                border-radius: 8px;
                font-size: 12px;
                font-weight: 600;
                background: var(--bg-main);
                color: var(--text-gray);
            }

            .time-badge i {
                font-size: 11px;
            }

            .time-badge.on-time {
                background: rgba(16, 185, 129, 0.1);
                color: var(--success-green);
            }

            .time-badge.late {
                background: rgba(239, 68, 68, 0.1);
                color: var(--danger-red);
            }

            .notes-input {
                width: 100%;
                padding: 8px 12px;
                border: 1px solid var(--border-color);
                border-radius: 8px;
                font-size: 13px;
                outline: none;
                font-family: inherit;
            }

            .notes-input:focus {
                border-color: var(--primary-blue);
            }

            .action-buttons {
                display: flex;
                gap: 8px;
            }

            .btn-icon {
                width: 32px;
                height: 32px;
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

            .btn-icon:hover {
                background: var(--bg-main);
                border-color: var(--primary-blue);
                color: var(--primary-blue);
            }

            .btn-icon.edit:hover {
                border-color: var(--warning-yellow);
                color: var(--warning-yellow);
            }

            .btn-icon.delete:hover {
                border-color: var(--danger-red);
                color: var(--danger-red);
            }

            .pagination {
                padding: 20px 24px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-top: 1px solid var(--border-color);
            }

            .pagination-info {
                font-size: 13px;
                color: var(--text-gray);
            }

            .pagination-buttons {
                display: flex;
                gap: 8px;
            }

            .pagination-btn {
                padding: 8px 12px;
                border: 1px solid var(--border-color);
                border-radius: 8px;
                background: white;
                color: var(--text-gray);
                font-size: 13px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s ease;
                min-width: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .pagination-btn:hover:not(:disabled) {
                background: var(--bg-main);
                border-color: var(--primary-blue);
                color: var(--primary-blue);
            }

            .pagination-btn.active {
                background: var(--primary-blue);
                border-color: var(--primary-blue);
                color: white;
            }

            .pagination-btn:disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }

            @media (max-width: 1200px) {
                .stats-mini {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                .stats-mini {
                    grid-template-columns: 1fr;
                }

                .filter-bar {
                    flex-direction: column;
                    align-items: stretch;
                }

                .filter-tabs {
                    margin-left: 0;
                    overflow-x: auto;
                }

                .page-actions {
                    flex-direction: column;
                    align-items: stretch;
                    gap: 12px;
                }

                .button-group {
                    flex-direction: column;
                }
            }
        </style>
    @endpush

    @section('content')
        <div class="page-header">
            <h1 class="page-title">Absensi Hari Ini</h1>
            <p class="page-subtitle">Senin, 05 Januari 2026 • Rekap absensi siswa hari ini</p>
        </div>

        <div class="page-actions">
            <div></div>
            <div class="button-group">
                <button class="btn-primary">
                    <i class="fas fa-save"></i>
                    Input Absen Manual
                </button>
            </div>
        </div>

        <!-- Mini Statistics -->
        <div class="stats-mini">
            <div class="stat-mini-card">
                <div class="stat-mini-icon" style="background: rgba(76, 111, 255, 0.1); color: var(--primary-blue);">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-mini-content">
                    <div class="stat-mini-label">Total Siswa</div>
                    <div class="stat-mini-value">847</div>
                    <div class="stat-mini-subtitle">Semua siswa aktif</div>
                </div>
            </div>

            <div class="stat-mini-card">
                <div class="stat-mini-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--success-green);">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-mini-content">
                    <div class="stat-mini-label">Hadir</div>
                    <div class="stat-mini-value">789</div>
                    <div class="stat-mini-subtitle">93.2% kehadiran</div>
                </div>
            </div>

            <div class="stat-mini-card">
                <div class="stat-mini-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--warning-yellow);">
                    <i class="fas fa-file-medical"></i>
                </div>
                <div class="stat-mini-content">
                    <div class="stat-mini-label">Izin / Sakit</div>
                    <div class="stat-mini-value">42</div>
                    <div class="stat-mini-subtitle">5.0% siswa</div>
                </div>
            </div>

            <div class="stat-mini-card">
                <div class="stat-mini-icon" style="background: rgba(239, 68, 68, 0.1); color: var(--danger-red);">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-mini-content">
                    <div class="stat-mini-label">Tidak Hadir</div>
                    <div class="stat-mini-value">16</div>
                    <div class="stat-mini-subtitle">1.8% siswa</div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-item">
                <label class="filter-label">Filter</label>
                <select class="filter-select">
                    <option>Semua Kelas</option>
                    <option>X IPA 1</option>
                    <option>X IPA 2</option>
                    <option>X IPS 1</option>
                    <option>XI IPA 1</option>
                </select>
            </div>

            <div class="filter-item">
                <label class="filter-label">Kelas</label>
                <select class="filter-select">
                    <option>Semua Kelas</option>
                    <option>Kelas X</option>
                    <option>Kelas XI</option>
                    <option>Kelas XII</option>
                </select>
            </div>

            <div class="filter-item">
                <label class="filter-label">Status</label>
                <select class="filter-select">
                    <option>Semua Status</option>
                    <option>Hadir</option>
                    <option>Izin</option>
                    <option>Sakit</option>
                    <option>Alpha</option>
                </select>
            </div>

            <div class="filter-item">
                <label class="filter-label">Waktu</label>
                <select class="filter-select">
                    <option>Semua Waktu</option>
                    <option>Tepat Waktu</option>
                    <option>Terlambat</option>
                </select>
            </div>
            <div class="filter-item filter-buttons-container">
                <button class="btn-reset">
                    <i class="fas fa-redo"></i>
                    Reset Filter
                </button>
            </div>

        </div>

        <!-- Student List -->
        <div class="student-list">
            <div class="student-list-header">
                <div>
                    <div class="list-title">Daftar Absensi Siswa</div>
                    <div class="list-subtitle">Menampilkan 7 dari 847 siswa</div>
                </div>
            </div>

            <table class="student-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Waktu Absen</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="student-profile">
                                <div class="student-photo" style="background: linear-gradient(135deg, #4C6FFF, #3451E8);">
                                    DM
                                </div>
                                <div class="student-data">
                                    <div class="student-nis">2024001</div>
                                    <div class="student-fullname">Doni Mahendra</div>
                                    <div class="student-meta">Laki-laki</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 600;">X IPA 1</div>
                            <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 10</div>
                        </td>
                        <td>
                            <span class="time-badge on-time">
                                <i class="fas fa-clock"></i>
                                07:15:00
                            </span>
                        </td>
                        <td>
                            <select class="status-select hadir">
                                <option value="hadir">✓ Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="notes-input" placeholder="Tambah keterangan..." value="-">
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>
                            <div class="student-profile">
                                <div class="student-photo" style="background: linear-gradient(135deg, #10B981, #059669);">
                                    LN
                                </div>
                                <div class="student-data">
                                    <div class="student-nis">2024002</div>
                                    <div class="student-fullname">Linda Nur</div>
                                    <div class="student-meta">Perempuan</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 600;">X IPA 1</div>
                            <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 10</div>
                        </td>
                        <td>
                            <span class="time-badge on-time">
                                <i class="fas fa-clock"></i>
                                07:18:45
                            </span>
                        </td>
                        <td>
                            <select class="status-select hadir">
                                <option value="hadir" selected>✓ Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="notes-input" placeholder="Tambah keterangan..." value="-">
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>
                            <div class="student-profile">
                                <div class="student-photo" style="background: linear-gradient(135deg, #F59E0B, #D97706);">
                                    BH
                                </div>
                                <div class="student-data">
                                    <div class="student-nis">2024003</div>
                                    <div class="student-fullname">Budi Hermawan</div>
                                    <div class="student-meta">Laki-laki</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 600;">X IPA 2</div>
                            <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 10</div>
                        </td>
                        <td>
                            <span class="time-badge">
                                <i class="fas fa-clock"></i>
                                -
                            </span>
                        </td>
                        <td>
                            <select class="status-select izin">
                                <option value="hadir">✓ Hadir</option>
                                <option value="izin" selected>⚠ Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="notes-input" placeholder="Tambah keterangan..."
                                value="Keperluan keluarga">
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>
                            <div class="student-profile">
                                <div class="student-photo" style="background: linear-gradient(135deg, #3B82F6, #2563EB);">
                                    SR
                                </div>
                                <div class="student-data">
                                    <div class="student-nis">2024004</div>
                                    <div class="student-fullname">Siti Rahma</div>
                                    <div class="student-meta">Perempuan</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 600;">X IPA 2</div>
                            <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 10</div>
                        </td>
                        <td>
                            <span class="time-badge">
                                <i class="fas fa-clock"></i>
                                -
                            </span>
                        </td>
                        <td>
                            <select class="status-select sakit">
                                <option value="hadir">✓ Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit" selected>Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="notes-input" placeholder="Tambah keterangan..."
                                value="Demam tinggi, ada surat dokter">
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>
                            <div class="student-profile">
                                <div class="student-photo" style="background: linear-gradient(135deg, #8B5CF6, #7C3AED);">
                                    RG
                                </div>
                                <div class="student-data">
                                    <div class="student-nis">2024005</div>
                                    <div class="student-fullname">Rudi Gunawan</div>
                                    <div class="student-meta">Laki-laki</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 600;">X IPS 1</div>
                            <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 10</div>
                        </td>
                        <td>
                            <span class="time-badge late">
                                <i class="fas fa-clock"></i>
                                07:35:12
                            </span>
                        </td>
                        <td>
                            <select class="status-select hadir">
                                <option value="hadir" selected>✓ Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="notes-input" placeholder="Tambah keterangan..."
                                value="Terlambat 5 menit">
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>6</td>
                        <td>
                            <div class="student-profile">
                                <div class="student-photo" style="background: linear-gradient(135deg, #EC4899, #DB2777);">
                                    FH
                                </div>
                                <div class="student-data">
                                    <div class="student-nis">2024006</div>
                                    <div class="student-fullname">Fatimah Hidayat</div>
                                    <div class="student-meta">Perempuan</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 600;">XI IPA 1</div>
                            <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 11</div>
                        </td>
                        <td>
                            <span class="time-badge on-time">
                                <i class="fas fa-clock"></i>
                                07:12:30
                            </span>
                        </td>
                        <td>
                            <select class="status-select hadir">
                                <option value="hadir" selected>✓ Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="notes-input" placeholder="Tambah keterangan..." value="-">
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>7</td>
                        <td>
                            <div class="student-profile">
                                <div class="student-photo" style="background: linear-gradient(135deg, #EF4444, #DC2626);">
                                    AR
                                </div>
                                <div class="student-data">
                                    <div class="student-nis">2024007</div>
                                    <div class="student-fullname">Agus Rahman</div>
                                    <div class="student-meta">Laki-laki</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 600;">XI IPA 1</div>
                            <div style="font-size: 12px; color: var(--text-gray); margin-top: 2px;">Kelas 11</div>
                        </td>
                        <td>
                            <span class="time-badge">
                                <i class="fas fa-clock"></i>
                                -
                            </span>
                        </td>
                        <td>
                            <select class="status-select alpha">
                                <option value="hadir">✓ Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha" selected>✗ Alpha</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="notes-input" placeholder="Tambah keterangan..."
                                value="Tanpa keterangan">
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="pagination">
                <div class="pagination-info">
                    Menampilkan 1-7 dari 847 siswa
                </div>
                <div class="pagination-buttons">
                    <button class="pagination-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">...</button>
                    <button class="pagination-btn">121</button>
                    <button class="pagination-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    @endsection
