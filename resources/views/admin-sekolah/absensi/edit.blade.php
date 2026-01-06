@extends('layouts.app')

@section('title', 'Hapus Data Absensi')

@push('styles')
    <style>
        .delete-container {
            max-width: 600px;
            margin: 40px auto;
        }

        .delete-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .delete-header {
            padding: 40px 32px 32px;
            text-align: center;
            background: linear-gradient(135deg, #FEE2E2, #FECACA);
        }

        .delete-icon-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
        }

        .delete-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--danger-red), #DC2626);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            box-shadow: 0 8px 24px rgba(239, 68, 68, 0.4);
            animation: shake 0.5s ease;
        }

        @keyframes shake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: rotate(-5deg);
            }

            20%,
            40%,
            60%,
            80% {
                transform: rotate(5deg);
            }
        }

        .delete-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .delete-subtitle {
            font-size: 15px;
            color: var(--text-gray);
            line-height: 1.6;
        }

        .delete-body {
            padding: 32px;
        }

        /* Student Info Card */
        .student-delete-card {
            background: var(--bg-main);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .student-avatar-delete {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(76, 111, 255, 0.3);
        }

        .student-delete-info {
            flex: 1;
        }

        .student-delete-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .student-delete-meta {
            font-size: 13px;
            color: var(--text-gray);
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .student-delete-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .student-delete-meta i {
            color: var(--primary-blue);
            font-size: 11px;
        }

        /* Detail Info */
        .delete-details {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .detail-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--bg-main);
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 140px 1fr;
            gap: 12px;
        }

        .detail-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-gray);
        }

        .detail-value {
            font-size: 13px;
            color: var(--text-dark);
            font-weight: 600;
        }

        /* Warning Box */
        .danger-box {
            background: #FEE2E2;
            border: 2px solid var(--danger-red);
            border-radius: 12px;
            padding: 16px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #991B1B;
            margin-bottom: 24px;
        }

        .danger-box i {
            font-size: 20px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .danger-box-content {
            font-size: 14px;
            line-height: 1.6;
        }

        .danger-box-content strong {
            display: block;
            font-size: 15px;
            margin-bottom: 4px;
        }

        /* Confirmation Checkbox */
        .confirm-checkbox {
            background: var(--bg-main);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .confirm-checkbox:hover {
            background: white;
            border-color: var(--danger-red);
        }

        .confirm-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: var(--danger-red);
        }

        .confirm-checkbox label {
            font-size: 14px;
            color: var(--text-dark);
            cursor: pointer;
            user-select: none;
        }

        .delete-actions {
            padding: 20px 32px;
            border-top: 1px solid var(--border-color);
            background: var(--bg-main);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .btn-cancel {
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
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: var(--bg-main);
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .btn-delete {
            padding: 12px 24px;
            background: linear-gradient(135deg, var(--danger-red), #DC2626);
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

        .btn-delete:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(239, 68, 68, 0.3);
        }

        .btn-delete:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        @media (max-width: 768px) {
            .delete-container {
                margin: 20px auto;
            }

            .student-delete-card {
                flex-direction: column;
                text-align: center;
            }

            .student-delete-meta {
                justify-content: center;
            }

            .detail-grid {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .detail-label {
                font-weight: 700;
            }

            .delete-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn-cancel,
            .btn-delete {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Hapus Data Absensi</h1>
        <p class="page-subtitle">Konfirmasi penghapusan data absensi</p>
    </div>

    <div class="delete-container">
        <form action="{{ route('absensi.destroy', 1) }}" method="POST" id="deleteForm">
            @csrf
            @method('DELETE')

            <div class="delete-card">
                <div class="delete-header">
                    <div class="delete-icon-wrapper">
                        <div class="delete-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                    <h2 class="delete-title">Hapus Data Absensi?</h2>
                    <p class="delete-subtitle">
                        Tindakan ini akan menghapus data absensi secara permanen dari sistem
                    </p>
                </div>

                <div class="delete-body">
                    <!-- Student Info Card -->
                    <div class="student-delete-card">
                        <div class="student-avatar-delete">
                            DM
                        </div>
                        <div class="student-delete-info">
                            <div class="student-delete-name">Doni Mahendra</div>
                            <div class="student-delete-meta">
                                <span><i class="fas fa-id-card"></i> NIS: 2024001</span>
                                <span><i class="fas fa-school"></i> X IPA 1</span>
                                <span><i class="fas fa-calendar"></i> 05 Januari 2026</span>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Info -->
                    <div class="delete-details">
                        <div class="detail-title">Detail Absensi yang Akan Dihapus</div>
                        <div class="detail-grid">
                            <div class="detail-label">Tanggal</div>
                            <div class="detail-value">Senin, 05 Januari 2026</div>

                            <div class="detail-label">Waktu Absen</div>
                            <div class="detail-value">07:15:00 WIB</div>

                            <div class="detail-label">Status</div>
                            <div class="detail-value">
                                <span style="color: var(--success-green);">✓ Hadir</span>
                            </div>

                            <div class="detail-label">Ketepatan Waktu</div>
                            <div class="detail-value">Tepat Waktu</div>

                            <div class="detail-label">Keterangan</div>
                            <div class="detail-value">-</div>

                            <div class="detail-label">Dibuat Pada</div>
                            <div class="detail-value">05 Jan 2026, 07:15 WIB</div>

                            <div class="detail-label">Dibuat Oleh</div>
                            <div class="detail-value">Admin System</div>
                        </div>
                    </div>

                    <!-- Warning Box -->
                    <div class="danger-box">
                        <i class="fas fa-exclamation-circle"></i>
                        <div class="danger-box-content">
                            <strong>Peringatan!</strong>
                            Data yang sudah dihapus tidak dapat dikembalikan. Pastikan Anda benar-benar
                            yakin sebelum melanjutkan tindakan ini. Data absensi yang dihapus akan
                            hilang permanen dari sistem dan tidak dapat dipulihkan.
                        </div>
                    </div>

                    <!-- Confirmation Checkbox -->
                    <div class="confirm-checkbox">
                        <input type="checkbox" id="confirmDelete" name="confirm" required>
                        <label for="confirmDelete">
                            Saya memahami konsekuensi dan yakin ingin menghapus data absensi ini
                        </label>
                    </div>
                </div>

                <div class="delete-actions">
                    <a href="{{ route('absensi.index') }}" class="btn-cancel">
                        <i class="fas fa-times"></i>
                        Batal
                    </a>
                    <button type="submit" class="btn-delete" id="btnDelete" disabled>
                        <i class="fas fa-trash"></i>
                        Ya, Hapus Data
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Enable/disable delete button based on checkbox
        const confirmCheckbox = document.getElementById('confirmDelete');
        const btnDelete = document.getElementById('btnDelete');

        confirmCheckbox.addEventListener('change', function() {
            btnDelete.disabled = !this.checked;
        });

        // Form submission confirmation
        document.getElementById('deleteForm').addEventListener('submit', function(e) {
            if (!confirmCheckbox.checked) {
                e.preventDefault();
                alert('Anda harus mencentang kotak konfirmasi terlebih dahulu!');
                return false;
            }

            // Final confirmation
            if (!confirm(
                    'Apakah Anda benar-benar yakin ingin menghapus data absensi ini?\n\nData yang dihapus tidak dapat dikembalikan!'
                    )) {
                e.preventDefault();
                return false;
            }

            // Show loading state
            btnDelete.disabled = true;
            btnDelete.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';
        });
    </script>
@endpush
