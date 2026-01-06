<!-- Modal Delete Absensi -->
<div id="modalDeleteAbsensi" class="modal">
    <div class="modal-overlay"></div>
    <div class="modal-container modal-small">
        <div class="modal-header modal-header-danger">
            <div class="modal-icon-wrapper">
                <div class="modal-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
        </div>

        <div class="modal-body modal-body-center">
            <h3 class="modal-title-center">Hapus Data Absensi?</h3>
            <p class="modal-text-center">
                Anda akan menghapus data absensi untuk:
            </p>

            <div class="delete-info-card">
                <div class="delete-student-avatar">
                    DM
                </div>
                <div>
                    <div class="delete-student-name">Doni Mahendra</div>
                    <div class="delete-student-meta">
                        <span>NIS: 2024001</span> •
                        <span>X IPA 1</span> •
                        <span>05 Jan 2026</span>
                    </div>
                </div>
            </div>

            <div class="warning-box">
                <i class="fas fa-info-circle"></i>
                <span>Data yang sudah dihapus tidak dapat dikembalikan. Pastikan Anda yakin sebelum melanjutkan.</span>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn-cancel" onclick="closeModal('modalDeleteAbsensi')">
                <i class="fas fa-times"></i>
                Batal
            </button>
            <button type="button" class="btn-delete" onclick="confirmDelete()">
                <i class="fas fa-trash"></i>
                Ya, Hapus Data
            </button>
        </div>
    </div>
</div>

<style>
    .modal-small {
        max-width: 480px;
    }

    .modal-header-danger {
        border-bottom: none;
        padding: 32px 24px 0;
        display: flex;
        justify-content: center;
    }

    .modal-icon-wrapper {
        display: flex;
        justify-content: center;
    }

    .modal-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FEE2E2, #FECACA);
        color: var(--danger-red);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        animation: shake 0.5s ease;
    }

    .modal-body-center {
        text-align: center;
        padding: 24px;
    }

    .modal-title-center {
        font-size: 22px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .modal-text-center {
        font-size: 14px;
        color: var(--text-gray);
        margin-bottom: 20px;
    }

    .delete-info-card {
        background: var(--bg-main);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 16px;
        text-align: left;
    }

    .delete-student-avatar {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .delete-student-name {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 4px;
    }

    .delete-student-meta {
        font-size: 12px;
        color: var(--text-gray);
    }

    .warning-box {
        background: #FEF3C7;
        border: 1px solid #FCD34D;
        border-radius: 10px;
        padding: 12px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #92400E;
        font-size: 13px;
        text-align: left;
        line-height: 1.5;
    }

    .warning-box i {
        flex-shrink: 0;
        margin-top: 2px;
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

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(239, 68, 68, 0.3);
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
</style>

<script>
    // Function to open delete modal with student data
    function openDeleteModal(studentData) {
        const modal = document.getElementById('modalDeleteAbsensi');

        // Update student info
        modal.querySelector('.delete-student-avatar').textContent = studentData.initials;
        modal.querySelector('.delete-student-name').textContent = studentData.name;
        modal.querySelector('.delete-student-meta').innerHTML = `
            <span>NIS: ${studentData.nis}</span> • 
            <span>${studentData.class}</span> • 
            <span>${studentData.date}</span>
        `;

        // Store student ID for deletion
        modal.setAttribute('data-student-id', studentData.id);

        openModal('modalDeleteAbsensi');
    }

    // Confirm delete
    function confirmDelete() {
        const modal = document.getElementById('modalDeleteAbsensi');
        const studentId = modal.getAttribute('data-student-id');

        console.log('Menghapus absensi dengan ID:', studentId);

        // Simulasi penghapusan
        alert('Absensi berhasil dihapus!');

        closeModal('modalDeleteAbsensi');

        // Reload atau update tabel
        // location.reload();
    }
</script>
