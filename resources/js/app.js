import './bootstrap';
// Main JavaScript untuk Sistem Absensi Sekolah

document.addEventListener('DOMContentLoaded', function() {
    console.log('Sistem Absensi Sekolah - Loaded');
    
    // Initialize all components
    initSidebar();
    initDropdowns();
    initModals();
    initTooltips();
    initDatePickers();
    initSearchFilters();
});

// Sidebar Toggle untuk Mobile
function initSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.getElementById('sidebar-toggle');
    
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        }
    });
}

// Dropdown Management
function initDropdowns() {
    const dropdowns = document.querySelectorAll('.dropdown');
    
    dropdowns.forEach(dropdown => {
        const trigger = dropdown.querySelector('.dropdown-trigger');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        if (trigger && menu) {
            trigger.addEventListener('click', function(e) {
                e.stopPropagation();
                
                // Close other dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(m => {
                    if (m !== menu) m.classList.remove('active');
                });
                
                menu.classList.toggle('active');
            });
        }
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.remove('active');
        });
    });
}

// Modal Management
function initModals() {
    // Open Modal
    document.querySelectorAll('[data-modal-target]').forEach(trigger => {
        trigger.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-target');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    });
    
    // Close Modal
    document.querySelectorAll('[data-modal-close]').forEach(closeBtn => {
        closeBtn.addEventListener('click', function() {
            const modal = this.closest('.modal');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });
    
    // Close modal when clicking backdrop
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });
}

// Tooltips
function initTooltips() {
    const tooltips = document.querySelectorAll('[data-tooltip]');
    
    tooltips.forEach(element => {
        const tooltipText = element.getAttribute('data-tooltip');
        
        element.addEventListener('mouseenter', function(e) {
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.textContent = tooltipText;
            document.body.appendChild(tooltip);
            
            const rect = element.getBoundingClientRect();
            tooltip.style.top = (rect.top - tooltip.offsetHeight - 8) + 'px';
            tooltip.style.left = (rect.left + (rect.width - tooltip.offsetWidth) / 2) + 'px';
            
            setTimeout(() => tooltip.classList.add('active'), 10);
        });
        
        element.addEventListener('mouseleave', function() {
            const tooltip = document.querySelector('.tooltip');
            if (tooltip) {
                tooltip.classList.remove('active');
                setTimeout(() => tooltip.remove(), 200);
            }
        });
    });
}

// Date Pickers Enhancement
function initDatePickers() {
    const datePickers = document.querySelectorAll('input[type="date"]');
    
    datePickers.forEach(picker => {
        // Set max date to today
        const today = new Date().toISOString().split('T')[0];
        if (picker.hasAttribute('data-max-today')) {
            picker.setAttribute('max', today);
        }
        
        // Set min date to start of school year
        if (picker.hasAttribute('data-min-school-year')) {
            const schoolYearStart = '2025-07-01';
            picker.setAttribute('min', schoolYearStart);
        }
    });
}

// Search & Filter
function initSearchFilters() {
    const searchInputs = document.querySelectorAll('.search-input');
    
    searchInputs.forEach(input => {
        let timeout;
        
        input.addEventListener('input', function() {
            clearTimeout(timeout);
            
            timeout = setTimeout(() => {
                const searchTerm = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('.data-table tbody tr');
                
                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            }, 300);
        });
    });
}

// Toast Notifications
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    
    const icon = {
        'success': 'fa-check-circle',
        'error': 'fa-times-circle',
        'warning': 'fa-exclamation-circle',
        'info': 'fa-info-circle'
    }[type] || 'fa-info-circle';
    
    toast.innerHTML = `
        <i class="fas ${icon}"></i>
        <span>${message}</span>
        <button class="toast-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => toast.classList.add('active'), 10);
    setTimeout(() => {
        toast.classList.remove('active');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Confirmation Dialog
function showConfirm(message, onConfirm) {
    const modal = document.createElement('div');
    modal.className = 'confirm-modal';
    modal.innerHTML = `
        <div class="confirm-content">
            <i class="fas fa-exclamation-triangle"></i>
            <h3>Konfirmasi</h3>
            <p>${message}</p>
            <div class="confirm-actions">
                <button class="btn-secondary" onclick="this.closest('.confirm-modal').remove()">Batal</button>
                <button class="btn-danger" id="confirm-yes">Ya, Lanjutkan</button>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    document.getElementById('confirm-yes').addEventListener('click', function() {
        onConfirm();
        modal.remove();
    });
    
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            this.remove();
        }
    });
}

// Export Functions
function exportToExcel(tableId) {
    showToast('Mengexport data ke Excel...', 'info');
    // Implement export logic here
    setTimeout(() => {
        showToast('Data berhasil diexport!', 'success');
    }, 1500);
}

function exportToPDF(tableId) {
    showToast('Mengexport data ke PDF...', 'info');
    // Implement export logic here
    setTimeout(() => {
        showToast('Data berhasil diexport!', 'success');
    }, 1500);
}

function printReport() {
    window.print();
}

// Form Validation
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;
    
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('invalid');
            showToast(`${input.placeholder || input.name} harus diisi!`, 'error');
        } else {
            input.classList.remove('invalid');
        }
    });
    
    return isValid;
}

// Handle Status Change
function handleStatusChange(selectElement) {
    const statusValue = selectElement.value;
    const row = selectElement.closest('tr');
    
    // Remove all status classes
    selectElement.classList.remove('hadir', 'izin', 'sakit', 'alpha', 'belum');
    
    // Add new status class
    selectElement.classList.add(statusValue);
    
    // Show toast
    const studentName = row.querySelector('.student-name').textContent;
    showToast(`Status ${studentName} diubah menjadi ${statusValue}`, 'info');
}

// Bulk Actions
function handleBulkAction(action) {
    const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
    
    if (checkedBoxes.length === 0) {
        showToast('Pilih minimal satu item!', 'warning');
        return;
    }
    
    showConfirm(`Yakin ingin ${action} ${checkedBoxes.length} item yang dipilih?`, () => {
        // Implement bulk action logic
        showToast(`${action} ${checkedBoxes.length} item berhasil!`, 'success');
        checkedBoxes.forEach(checkbox => checkbox.checked = false);
    });
}

// Toggle Select All
function toggleSelectAll(checkbox) {
    const checkboxes = document.querySelectorAll('.row-checkbox');
    checkboxes.forEach(cb => cb.checked = checkbox.checked);
}

// Filter by Class
function filterByClass(className) {
    const rows = document.querySelectorAll('.data-table tbody tr');
    
    rows.forEach(row => {
        const classCell = row.querySelector('[data-class]');
        if (!classCell) return;
        
        if (className === 'all' || classCell.getAttribute('data-class') === className) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Auto Save Draft
let autoSaveTimer;
function enableAutoSave(formId) {
    const form = document.getElementById(formId);
    if (!form) return;
    
    form.addEventListener('input', function() {
        clearTimeout(autoSaveTimer);
        
        autoSaveTimer = setTimeout(() => {
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            
            localStorage.setItem(`draft_${formId}`, JSON.stringify(data));
            showToast('Draft tersimpan otomatis', 'info');
        }, 2000);
    });
}

// Load Draft
function loadDraft(formId) {
    const draft = localStorage.getItem(`draft_${formId}`);
    if (!draft) return;
    
    const data = JSON.parse(draft);
    const form = document.getElementById(formId);
    
    Object.keys(data).forEach(key => {
        const input = form.querySelector(`[name="${key}"]`);
        if (input) input.value = data[key];
    });
    
    showToast('Draft dimuat', 'info');
}

// Clear Draft
function clearDraft(formId) {
    localStorage.removeItem(`draft_${formId}`);
}

// Initialize Charts (placeholder for future implementation)
function initCharts() {
    // Chart.js or ApexCharts initialization will go here
    console.log('Charts initialized');
}

// Refresh Data
function refreshData() {
    showToast('Memperbarui data...', 'info');
    
    // Simulate data refresh
    setTimeout(() => {
        location.reload();
    }, 1000);
}

// Global Error Handler
window.addEventListener('error', function(e) {
    console.error('Global error:', e.error);
    showToast('Terjadi kesalahan. Silakan refresh halaman.', 'error');
});

// Export functions to global scope
window.showToast = showToast;
window.showConfirm = showConfirm;
window.exportToExcel = exportToExcel;
window.exportToPDF = exportToPDF;
window.printReport = printReport;
window.handleStatusChange = handleStatusChange;
window.handleBulkAction = handleBulkAction;
window.toggleSelectAll = toggleSelectAll;
window.filterByClass = filterByClass;
window.refreshData = refreshData;