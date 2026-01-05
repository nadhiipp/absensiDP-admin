<!-- Modal Backdrop Delete -->
<div id="modalBackdropDelete" class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Modal Delete Content -->
<div id="modalDelete" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalBoxDelete">
        
        <!-- Modal Body -->
        <div class="p-6 text-center">
            <!-- Icon -->
            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-5">
                <i class="bi bi-exclamation-triangle-fill text-red-500 text-4xl"></i>
            </div>
            
            <!-- Title -->
            <h3 class="text-xl font-semibold text-slate-800 mb-2">Hapus Pegawai? </h3>
            
            <!-- Description -->
            <p class="text-slate-500 mb-2">Anda akan menghapus data pegawai: </p>
            
            <!-- Employee Info -->
            <div class="bg-slate-50 rounded-xl p-4 mb-5">
                <p class="text-lg font-semibold text-slate-800" id="delete_nama">-</p>
                <p class="text-sm text-slate-500" id="delete_nip">NIP: -</p>
                <p class="text-sm text-slate-500" id="delete_departemen">Departemen: -</p>
            </div>
            
            <!-- Warning -->
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5 text-left">
                <div class="flex gap-3">
                    <i class="bi bi-exclamation-circle-fill text-red-500 text-lg flex-shrink-0"></i>
                    <div>
                        <h4 class="text-sm font-medium text-red-800">Peringatan! </h4>
                        <p class="text-sm text-red-600 mt-1">Tindakan ini tidak dapat dibatalkan.  Semua data terkait pegawai ini akan dihapus secara permanen.</p>
                    </div>
                </div>
            </div>
            
            <!-- Hidden Input for ID -->
            <input type="hidden" id="delete_id">
        </div>

        <!-- Modal Footer -->
        <div class="flex items-center justify-center gap-3 px-6 py-4 border-t border-slate-200 bg-slate-50">
            <button type="button" onclick="closeModalDelete()" class="px-6 py-2.5 border border-slate-300 text-slate-700 rounded-xl text-sm font-medium hover:bg-slate-100 transition-all inline-flex items-center gap-2">
                <i class="bi bi-x-lg"></i>
                Batal
            </button>
            <button type="button" onclick="confirmDelete()" class="px-6 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm font-medium transition-all inline-flex items-center gap-2 shadow-lg shadow-red-500/30">
                <i class="bi bi-trash"></i>
                Ya, Hapus
            </button>
        </div>
    </div>
</div>

<script>
    // Open Modal Delete
    function openModalDelete(nip, nama, departemen) {
        const backdrop = document.getElementById('modalBackdropDelete');
        const modal = document.getElementById('modalDelete');
        const modalBox = document.getElementById('modalBoxDelete');
        
        // Fill data
        document.getElementById('delete_id').value = nip;
        document. getElementById('delete_nama').textContent = nama;
        document.getElementById('delete_nip').textContent = 'NIP: ' + nip;
        document.getElementById('delete_departemen').textContent = 'Departemen:  ' + departemen;
        
        // Show modal
        backdrop.classList.remove('hidden');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        document.body. style.overflow = 'hidden';
    }
    
    // Close Modal Delete
    function closeModalDelete() {
        const backdrop = document.getElementById('modalBackdropDelete');
        const modal = document.getElementById('modalDelete');
        const modalBox = document.getElementById('modalBoxDelete');
        
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList. add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            backdrop.classList.add('hidden');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
        
        document.body.style.overflow = 'auto';
    }
    
    // Confirm Delete
    function confirmDelete() {
        const nip = document.getElementById('delete_id').value;
        
        console.log('Delete Pegawai NIP:', nip);
        
        // Here you can add AJAX request to delete
        // Example: 
        // fetch(`/pegawai/${nip}`, { method: 'DELETE', headers: {'X-CSRF-TOKEN': '.. .'} })
        
        alert('Pegawai berhasil dihapus! ');
        
        closeModalDelete();
        // Reload page or remove row from table
        // location.reload();
    }
    
    // Close modal when clicking backdrop
    document. getElementById('modalBackdropDelete').addEventListener('click', closeModalDelete);
</script>