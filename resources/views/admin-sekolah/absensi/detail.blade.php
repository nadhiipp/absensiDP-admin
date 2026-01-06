@extends('layouts.app')

@section('title', 'Detail Absensi')

@push('styles')
    <style>
        .detail-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .detail-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .btn-back {
            padding: 10px 20px;
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
            text-decoration: none;
        }

        .btn-back:hover {
            background: var(--bg-main);
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .btn-edit {
            padding: 10px 20px;
            background: linear-gradient(135deg, var(--warning-yellow), #D97706);
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
            text-decoration: none;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(245, 158, 11, 0.3);
        }

        .btn-print {
            padding: 10px 20px;
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

        .btn-print:hover {
            background: var(--bg-main);
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .detail-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        /* Header Section */
        .detail-header {
            padding: 32px;
            background: linear-gradient(135deg, #F0F4FF, #E8EEFF);
            border-bottom: 1px solid var(--border-color);
        }

        .student-profile-detail {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .student-avatar-large {
            width: 90px;
            height: 90px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: 0 8px 24px rgba(76, 111, 255, 0.4);
        }

        .student-info-detail {
            flex: 1;
        }

        .student-name-large {
            font-size: 26px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .student-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge i {
            font-size: 11px;
        }

        .badge-primary {
            background: rgba(76, 111, 255, 0.1);
            color: var(--primary-blue);
            border: 1px solid rgba(76, 111, 255, 0.2);
        }

        .badge-secondary {
            background: rgba(107, 114, 128, 0.1);
            color: var(--text-gray);
            border: 1px solid rgba(107, 114, 128, 0.2);
        }

        .badge-info {
            background: rgba(59, 130, 246, 0.1);
            color: var(--info-blue);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        /* Body Section */
        .detail-body {
            padding: 32px;
        }

        .detail-section {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
        }

        .detail-section:last-child {
            margin-bottom: 0;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--bg-main);
        }

        .section-header i {
            color: var(--primary-blue);
            font-size: 18px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .detail-item.full-width {
            grid-column: 1 / -1;
        }

        .detail-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-label i {
            font-size: 11px;
            color: var(--primary-blue);
        }

        .detail-value {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .detail-value-large {
            font-size: 18px;
        }

        /* Status Badge */
        .status-badge-large {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
        }

        .status-badge-large i {
            font-size: 16px;
        }

        .status-hadir {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success-green);
            border: 2px solid rgba(16, 185, 129, 0.3);
        }

        .status-izin {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning-yellow);
            border: 2px solid rgba(245, 158, 11, 0.3);
        }

        .status-sakit {
            background: rgba(59, 130, 246, 0.15);
            color: var(--info-blue);
            border: 2px solid rgba(59, 130, 246, 0.3);
        }

        .status-alpha {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger-red);
            border: 2px solid rgba(239, 68, 68, 0.3);
        }

        .status-ontime {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success-green);
            border: 2px solid rgba(16, 185, 129, 0.3);
        }

        .status-late {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger-red);
            border: 2px solid rgba(239, 68, 68, 0.3);
        }

        /* Notes Display */
        .notes-display {
            background: var(--bg-main);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 14px;
            font-size: 14px;
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 60px;
        }

        /* Timeline Info */
        .timeline-info {
            background: var(--bg-main);
            border-left: 3px solid var(--primary-blue);
            border-radius: 8px;
            padding: 14px 16px;
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: var(--primary-blue);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 2px;
        }

        .timeline-text {
            font-size: 12px;
            color: var(--text-gray);
        }

        @media (max-width: 768px) {
            .detail-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-back,
            .btn-edit,
            .btn-print {
                width: 100%;
                justify-content: center;
            }

            .student-profile-detail {
                flex-direction: column;
                text-align: center;
            }

            .student-badges {
                justify-content: center;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }
        }

        @media print {

            .detail-actions,
            .btn-back,
            .action-buttons {
                display: none !important;
            }

            .detail-card {
                box-shadow: none;
                border: none;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Detail Absensi Siswa</h1>
        <p class="page-subtitle">Informasi lengkap data absensi</p>
    </div>

    <div class="detail-container">
        <!-- Action Buttons -->
        <div class="detail-actions">
            <a href="{{ route('absensi.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
            <div class="action-buttons">
                <button onclick="window.print()" class="btn-print">
                    <i class="fas fa-print"></i>
                    Cetak
                </button>
                <a href="{{ route('absensi.edit', 1) }}" class="btn-edit">
                    <i class="fas fa-edit"></i>
                    Edit Data
                </a>
            </div>
        </div>

        <!-- Detail Card -->
        <div class="detail-card">
            <!-- Header with Student Profile -->
            <div class="detail-header">
                <div class="student-profile-detail">
                    <div class="student-avatar-large">
                        DM
                    </div>
                    <div class="student-info-detail">
                        <h2 class="student-name-large">Doni Mahendra</h2>
                        <div class="student-badges">
                            <span class="badge badge-primary">
                                <i class="fas fa-id-card"></i>
                                NIS: 2024001
                            </span>
                            <span class="badge badge-secondary">
                                <i class="fas fa-school"></i>
                                X IPA 1
                            </span>
                            <span class="badge badge-info">
                                <i class="fas fa-venus-mars"></i>
                                Laki-laki
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Body with Details -->
            <div class="detail-body">
                <!-- Informasi Absensi -->
                <div class="detail-section">
                    <div class="section-header">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Informasi Absensi</span>
                    </div>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-calendar"></i>
                                Tanggal
                            </div>
                            <div class="detail-value detail-value-large">Senin, 05 Januari 2026</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-clock"></i>
                                Waktu Absen
                            </div>
                            <div class="detail-value detail-value-large">07:15:00 WIB</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-clipboard-list"></i>
                                Status Kehadiran
                            </div>
                            <div class="detail-value">
                                <span class="status-badge-large status-hadir">
                                    <i class="fas fa-check-circle"></i>
                                    Hadir
                                </span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-stopwatch"></i>
                                Ketepatan Waktu
                            </div>
                            <div class="detail-value">
                                <span class="status-badge-large status-ontime">
                                    <i class="fas fa-check"></i>
                                    Tepat Waktu
                                </span>
                            </div>
                        </div>

                        <div class="detail-item full-width">
                            <div class="detail-label">
                                <i class="fas fa-comment-alt"></i>
                                Keterangan
                            </div>
                            <div class="notes-display">
                                -
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="detail-section">
                    <div class="section-header">
                        <i class="fas fa-info-circle"></i>
                        <span>Informasi Tambahan</span>
                    </div>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-fingerprint"></i>
                                ID Absensi
                            </div>
                            <div class="detail-value">#ABS20260105001</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Lokasi Absen
                            </div>
                            <div class="detail-value">Sekolah</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-mobile-alt"></i>
                                Perangkat
                            </div>
                            <div class="detail-value">Mobile App</div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-qrcode"></i>
                                Metode Absen
                            </div>
                            <div class="detail-value">QR Code Scan</div>
                        </div>
                    </div>
                </div>

                <!-- Riwayat & Timeline -->
                <div class="detail-section">
                    <div class="section-header">
                        <i class="fas fa-history"></i>
                        <span>Riwayat Perubahan</span>
                    </div>
                    <div class="timeline-info">
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Data Dibuat</div>
                                <div class="timeline-text">
                                    05 Januari 2026, 07:15 WIB • Oleh: Admin System
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Terakhir Diupdate</div>
                                <div class="timeline-text">
                                    05 Januari 2026, 07:15 WIB • Oleh: -
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
