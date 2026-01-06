@extends('layouts.app')

@section('title', 'Data Siswa')

@push('styles')
    <style>
        .siswa-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .search-box {
            position: relative;
            width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
            background: white;
        }

        .search-box input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(76, 111, 255, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 14px;
        }

        .btn-add {
            padding: 12px 24px;
            background: linear-gradient(135deg, var(--success-green), #059669);
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

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
        }

        /* Siswa Table */
        .siswa-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
        }

        .siswa-card-header {
            padding: 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-left {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .card-subtitle {
            font-size: 13px;
            color: var(--text-gray);
        }

        .card-filters {
            display: flex;
            gap: 12px;
        }

        .filter-select-small {
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 13px;
            color: var(--text-dark);
            background: white;
            outline: none;
            cursor: pointer;
            min-width: 140px;
        }

        .siswa-table {
            width: 100%;
            border-collapse: collapse;
        }

        .siswa-table thead {
            background: var(--bg-main);
        }

        .siswa-table th {
            padding: 14px 24px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        .siswa-table td {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
        }

        .siswa-table tbody tr {
            transition: all 0.2s ease;
        }

        .siswa-table tbody tr:hover {
            background: #F9FAFB;
        }

        .siswa-profile-full {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .siswa-avatar-large {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }

        .siswa-info-full {
            display: flex;
            flex-direction: column;
        }

        .siswa-nis-badge {
            font-size: 11px;
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 3px;
            background: var(--bg-main);
            padding: 2px 8px;
            border-radius: 4px;
            display: inline-block;
            width: fit-content;
        }

        .siswa-name-full {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 3px;
        }

        .siswa-gender {
            font-size: 12px;
            color: var(--text-gray);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .siswa-contact {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .contact-item {
            font-size: 13px;
            color: var(--text-gray);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .contact-item i {
            font-size: 11px;
            color: var(--text-light);
            width: 14px;
        }

        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-indicator.aktif {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-green);
        }

        .status-indicator.non-aktif {
            background: rgba(156, 163, 175, 0.1);
            color: var(--text-gray);
        }

        .status-dot-small {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .action-buttons-group {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            width: 34px;
            height: 34px;
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

        .btn-action:hover {
            background: var(--bg-main);
        }

        .btn-action.view:hover {
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .btn-action.edit:hover {
            border-color: var(--warning-yellow);
            color: var(--warning-yellow);
        }

        .btn-action.delete:hover {
            border-color: var(--danger-red);
            color: var(--danger-red);
        }

        .attendance-indicator {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .attendance-percentage {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .attendance-bar-small {
            flex: 1;
            height: 6px;
            background: #E5E7EB;
            border-radius: 10px;
            overflow: hidden;
            max-width: 100px;
        }

        .attendance-fill {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        .attendance-fill.excellent {
            background: linear-gradient(90deg, var(--success-green), #34D399);
        }

        .attendance-fill.good {
            background: linear-gradient(90deg, #10B981, #34D399);
        }

        .attendance-fill.fair {
            background: linear-gradient(90deg, var(--warning-yellow), #FBBF24);
        }

        @media (max-width: 1200px) {
            .siswa-header {
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }

            .search-box {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .card-filters {
                flex-direction: column;
            }

            .filter-select-small {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Data Siswa</h1>
        <p class="page-subtitle">Kelola dan pantau data siswa sekolah</p>
    </div>

    <div class="siswa-header">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Cari siswa berdasarkan nama, NIS, atau kelas...">
        </div>
        <button class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Siswa
        </button>
    </div>

    <!-- Siswa Table -->
    <div class="siswa-card">
        <div class="siswa-card-header">
            <div class="card-header-left">
                <div class="card-title">Daftar Siswa</div>
                <div class="card-subtitle">Total 847 siswa terdaftar</div>
            </div>
            <div class="card-filters">
                <select class="filter-select-small">
                    <option>Semua Kelas</option>
                    <option>Kelas X</option>
                    <option>Kelas XI</option>
                    <option>Kelas XII</option>
                </select>
                <select class="filter-select-small">
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Non-Aktif</option>
                </select>
                <button class="btn-secondary">
                    <i class="fas fa-download"></i>
                    Export
                </button>
            </div>
        </div>

        <table class="siswa-table">
            <thead>
                <tr>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th>Kehadiran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="siswa-profile-full">
                            <div class="siswa-avatar-large" style="background: linear-gradient(135deg, #4C6FFF, #3451E8);">
                                AP
                            </div>
                            <div class="siswa-info-full">
                                <div class="siswa-nis-badge">2024001</div>
                                <div class="siswa-name-full">Andi Prasetyo</div>
                                <div class="siswa-gender">
                                    <i class="fas fa-mars"></i>
                                    Laki-laki
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600; margin-bottom: 4px;">X IPA 1</div>
                        <div style="font-size: 12px; color: var(--text-gray);">Kelas 10 • IPA</div>
                    </td>
                    <td>
                        <div class="siswa-contact">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                0812-3456-7890
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                andi@email.com
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status-indicator aktif">
                            <span class="status-dot-small"></span>
                            Aktif
                        </span>
                    </td>
                    <td>
                        <div class="attendance-indicator">
                            <span class="attendance-percentage">96%</span>
                            <div class="attendance-bar-small">
                                <div class="attendance-fill excellent" style="width: 96%;"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons-group">
                            <button class="btn-action view" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn-action edit" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-action delete" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="siswa-profile-full">
                            <div class="siswa-avatar-large" style="background: linear-gradient(135deg, #10B981, #059669);">
                                SR
                            </div>
                            <div class="siswa-info-full">
                                <div class="siswa-nis-badge">2024002</div>
                                <div class="siswa-name-full">Siti Rahma</div>
                                <div class="siswa-gender">
                                    <i class="fas fa-venus"></i>
                                    Perempuan
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600; margin-bottom: 4px;">X IPA 1</div>
                        <div style="font-size: 12px; color: var(--text-gray);">Kelas 10 • IPA</div>
                    </td>
                    <td>
                        <div class="siswa-contact">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                0813-9876-5432
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                siti@email.com
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status-indicator aktif">
                            <span class="status-dot-small"></span>
                            Aktif
                        </span>
                    </td>
                    <td>
                        <div class="attendance-indicator">
                            <span class="attendance-percentage">94%</span>
                            <div class="attendance-bar-small">
                                <div class="attendance-fill excellent" style="width: 94%;"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons-group">
                            <button class="btn-action view" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn-action edit" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-action delete" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="siswa-profile-full">
                            <div class="siswa-avatar-large" style="background: linear-gradient(135deg, #F59E0B, #D97706);">
                                BH
                            </div>
                            <div class="siswa-info-full">
                                <div class="siswa-nis-badge">2024003</div>
                                <div class="siswa-name-full">Budi Hermawan</div>
                                <div class="siswa-gender">
                                    <i class="fas fa-mars"></i>
                                    Laki-laki
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600; margin-bottom: 4px;">X IPA 2</div>
                        <div style="font-size: 12px; color: var(--text-gray);">Kelas 10 • IPA</div>
                    </td>
                    <td>
                        <div class="siswa-contact">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                0811-2233-4455
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                budi@email.com
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status-indicator aktif">
                            <span class="status-dot-small"></span>
                            Aktif
                        </span>
                    </td>
                    <td>
                        <div class="attendance-indicator">
                            <span class="attendance-percentage">89%</span>
                            <div class="attendance-bar-small">
                                <div class="attendance-fill good" style="width: 89%;"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons-group">
                            <button class="btn-action view" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn-action edit" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-action delete" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="siswa-profile-full">
                            <div class="siswa-avatar-large"
                                style="background: linear-gradient(135deg, #EF4444, #DC2626);">
                                DL
                            </div>
                            <div class="siswa-info-full">
                                <div class="siswa-nis-badge">2024004</div>
                                <div class="siswa-name-full">Dewi Lestari</div>
                                <div class="siswa-gender">
                                    <i class="fas fa-venus"></i>
                                    Perempuan
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600; margin-bottom: 4px;">X IPS 1</div>
                        <div style="font-size: 12px; color: var(--text-gray);">Kelas 10 • IPS</div>
                    </td>
                    <td>
                        <div class="siswa-contact">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                0815-6677-8899
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                dewi@email.com
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="status-indicator aktif">
                            <span class="status-dot-small"></span>
                            Aktif
                        </span>
                    </td>
                    <td>
                        <div class="attendance-indicator">
                            <span class="attendance-percentage">92%</span>
                            <div class="attendance-bar-small">
                                <div class="attendance-fill good" style="width: 92%;"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons-group">
                            <button class="btn-action view" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn-action edit" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-action delete" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="pagination">
            <div class="pagination-info">
                Menampilkan 1-4 dari 847 siswa
            </div>
            <div class="pagination-buttons">
                <button class="pagination-btn" disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn">2</button>
                <button class="pagination-btn">3</button>
                <button class="pagination-btn">...</button>
                <button class="pagination-btn">212</button>
                <button class="pagination-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
@endsection
