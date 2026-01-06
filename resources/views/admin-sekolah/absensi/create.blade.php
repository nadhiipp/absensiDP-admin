@extends('layouts.app')

@section('title', 'Input Absen Manual')

@push('styles')
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .form-header {
            padding: 24px;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, #F0F4FF, #E8EEFF);
        }

        .form-header-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .form-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 12px rgba(76, 111, 255, 0.3);
        }

        .form-header-text h2 {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .form-header-text p {
            font-size: 14px;
            color: var(--text-gray);
        }

        .form-body {
            padding: 32px;
        }

        .form-section {
            margin-bottom: 32px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--bg-main);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary-blue);
            font-size: 18px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: var(--primary-blue);
            font-size: 12px;
        }

        .form-label .required {
            color: var(--danger-red);
        }

        .form-control {
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

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(76, 111, 255, 0.1);
        }

        .form-control:disabled {
            background: var(--bg-main);
            cursor: not-allowed;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .form-help {
            font-size: 12px;
            color: var(--text-gray);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-help i {
            font-size: 11px;
        }

        .info-box {
            background: #EFF6FF;
            border: 1px solid #DBEAFE;
            border-radius: 10px;
            padding: 12px 16px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #1E40AF;
            font-size: 13px;
            line-height: 1.5;
        }

        .info-box i {
            font-size: 16px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .form-actions {
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
            border-color: var(--danger-red);
            color: var(--danger-red);
        }

        .btn-group {
            display: flex;
            gap: 12px;
        }

        .btn-submit {
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

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(76, 111, 255, 0.3);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .btn-draft {
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

        .btn-draft:hover {
            background: var(--bg-main);
            border-color: var(--warning-yellow);
            color: var(--warning-yellow);
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn-cancel,
            .btn-submit,
            .btn-draft {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Input Absen Manual</h1>
        <p class="page-subtitle">Tambahkan data absensi siswa secara manual</p>
    </div>

    <div class="form-container">
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <div class="form-card">
                <div class="form-header">
                    <div class="form-header-content">
                        <div class="form-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="form-header-text">
                            <h2>Form Input Absensi</h2>
                            <p>Lengkapi informasi di bawah ini untuk menambahkan data absensi</p>
                        </div>
                    </div>
                </div>

                <div class="form-body">
                    <!-- Data Siswa Section -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-user"></i>
                            <span>Data Siswa</span>
                        </div>

                        <div class="form-grid">
                            <div class="form-group full-width">
                                <label class="form-label">
                                    <i class="fas fa-user-graduate"></i>
                                    Pilih Siswa
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control" name="student_id" required>
                                    <option value="">-- Pilih Siswa --</option>
                                    <option value="1">2024001 - Doni Mahendra (X IPA 1)</option>
                                    <option value="2">2024002 - Linda Nur (X IPA 1)</option>
                                    <option value="3">2024003 - Budi Hermawan (X IPA 2)</option>
                                    <option value="4">2024004 - Siti Rahma (X IPA 2)</option>
                                    <option value="5">2024005 - Rudi Gunawan (X IPS 1)</option>
                                    <option value="6">2024006 - Fatimah Hidayat (XI IPA 1)</option>
                                    <option value="7">2024007 - Agus Rahman (XI IPA 1)</option>
                                </select>
                                <span class="form-help">
                                    <i class="fas fa-info-circle"></i>
                                    Pilih nama siswa yang akan diabsen
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-school"></i>
                                    Kelas
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control" name="class" required>
                                    <option value="">-- Pilih Kelas --</option>
                                    <option value="X IPA 1">X IPA 1</option>
                                    <option value="X IPA 2">X IPA 2</option>
                                    <option value="X IPS 1">X IPS 1</option>
                                    <option value="X IPS 2">X IPS 2</option>
                                    <option value="XI IPA 1">XI IPA 1</option>
                                    <option value="XI IPA 2">XI IPA 2</option>
                                    <option value="XI IPS 1">XI IPS 1</option>
                                    <option value="XII IPA 1">XII IPA 1</option>
                                    <option value="XII IPA 2">XII IPA 2</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-layer-group"></i>
                                    Tingkat Kelas
                                </label>
                                <input type="text" class="form-control" value="Kelas 10" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Absensi Section -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-clipboard-check"></i>
                            <span>Informasi Absensi</span>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-calendar"></i>
                                    Tanggal
                                    <span class="required">*</span>
                                </label>
                                <input type="date" class="form-control" name="date" value="2026-01-05" required>
                                <span class="form-help">
                                    <i class="fas fa-info-circle"></i>
                                    Tanggal kehadiran siswa
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clock"></i>
                                    Waktu Absen
                                    <span class="required">*</span>
                                </label>
                                <input type="time" class="form-control" name="time" value="07:15" required>
                                <span class="form-help">
                                    <i class="fas fa-info-circle"></i>
                                    Jam kedatangan siswa
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clipboard-list"></i>
                                    Status Kehadiran
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control" name="status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="hadir">✓ Hadir</option>
                                    <option value="izin">⚠ Izin</option>
                                    <option value="sakit">🏥 Sakit</option>
                                    <option value="alpha">✗ Alpha</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-stopwatch"></i>
                                    Ketepatan Waktu
                                </label>
                                <select class="form-control" name="punctuality">
                                    <option value="on-time">Tepat Waktu</option>
                                    <option value="late">Terlambat</option>
                                </select>
                                <span class="form-help">
                                    <i class="fas fa-info-circle"></i>
                                    Batas waktu: 07:30 WIB
                                </span>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label">
                                    <i class="fas fa-comment-alt"></i>
                                    Keterangan
                                </label>
                                <textarea class="form-control" name="notes"
                                    placeholder="Tambahkan keterangan atau catatan khusus terkait kehadiran siswa..."></textarea>
                                <span class="form-help">
                                    <i class="fas fa-info-circle"></i>
                                    Opsional: Tambahkan catatan jika diperlukan
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Info Box -->
                    <div class="info-box">
                        <i class="fas fa-info-circle"></i>
                        <div>
                            <strong>Perhatian:</strong> Pastikan semua data yang dimasukkan sudah benar.
                            Data absensi yang tersimpan akan langsung masuk ke sistem dan dapat dilihat
                            oleh wali kelas dan orang tua siswa.
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('absensi.index') }}" class="btn-cancel">
                        <i class="fas fa-times"></i>
                        Batal
                    </a>
                    <div class="btn-group">
                        <button type="button" class="btn-draft">
                            <i class="fas fa-save"></i>
                            Simpan Draft
                        </button>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-check"></i>
                            Simpan Absensi
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Auto-select class based on student selection
        document.querySelector('select[name="student_id"]').addEventListener('change', function() {
            const selectedText = this.options[this.selectedIndex].text;
            const classMatch = selectedText.match(/\(([^)]+)\)/);

            if (classMatch) {
                const className = classMatch[1];
                const classSelect = document.querySelector('select[name="class"]');

                for (let option of classSelect.options) {
                    if (option.value === className) {
                        option.selected = true;
                        break;
                    }
                }
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value) {
                    isValid = false;
                    field.style.borderColor = 'var(--danger-red)';
                } else {
                    field.style.borderColor = '';
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi (*)');
            }
        });
    </script>
@endpush
