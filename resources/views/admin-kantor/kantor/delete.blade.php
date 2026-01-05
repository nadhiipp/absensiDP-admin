<!-- Modal Backdrop Delete -->
<div id="modalBackdropDelete" class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Modal Delete Content -->
<div id="modalDelete" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalBoxDelete">
        
        <!-- Modal Body -->
        <div class="p-6 text-center">
            <!-- Icon -->
            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-5">
                <i class="bi bi-building-x text-red-500 text-4xl"></i>
            </div>
            
            <!-- Title -->
            <h3 class="text-xl font-semibold text-slate-800 mb-2">Hapus Kantor? </h3>
            
            <!-- Description -->
            <p class="text-slate-500 mb-4">Anda akan menghapus data kantor berikut:</p>
            
            <!-- Kantor Info Card -->
            <div class="bg-slate-50 rounded-xl p-4 mb-5 text-left">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-building text-blue-500 text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-base font-semibold text-slate-800 truncate" id="delete_nama">-</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-xs font-medium rounded" id="delete_tipe">-</span>
                        </div>
                        <p class="text-sm text-slate-500 mt-2 flex items-center gap-1">
                            <i class="bi bi-geo-alt text-xs"></i>
                            <span id="delete_alamat" class="truncate">-</span>
                        </p>
                        <p class="text-sm text-slate-500 mt-1 flex items-center gap-1">
                            <i class="bi bi-people text-xs"></i>
                            <span><span id="delete_pegawai">0</span> Pegawai</span>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Warning -->
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-left">
                <div class="flex gap-3">
                    <i class="bi bi-exclamation-triangle-fill text-red-500 text-lg flex-shrink-0"></i>
                    <div>
                        <h4 class="text-sm font-medium text-red-800">Peringatan! </h4>
                        <p class="text-sm text-red-600 mt-1">Tindakan ini tidak dapat dibatalkan.  Semua data terkait kantor ini termasuk data pegawai yang terhubung akan terpengaruh.</p>
                    </div>
                </div>
            </div>
            
            <input type="hidden" id="delete_id">
        </div>

        <!-- Modal Footer -->
        <div class="flex items-center justify-center gap-3 px-6 py-4 border-t border-slate-200 bg-slate-50">
            <button type="button" onclick="closeModalDelete()" class="px-6 py-2.5 border border-slate-300 text-slate-700 rounded-xl text-sm font-medium hover:bg-slate-100 transition-all inline-flex items-center gap-2 flex-1 justify-center">
                <i class="bi bi-x-lg"></i>
                Batal
            </button>
            <button type="button" onclick="confirmDelete()" class="px-6 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm font-medium transition-all inline-flex items-center gap-2 shadow-lg shadow-red-500/30 flex-1 justify-center">
                <i class="bi bi-trash"></i>
                Ya, Hapus
            </button>
        </div>
    </div>
</div>

<script>
    function openModalDelete(id, nama, tipe, alamat, pegawai) {
        const backdrop = document.getElementById('modalBackdropDelete');
        const modal = document.getElementById('modalDelete');
        const modalBox = document.getElementById('modalBoxDelete');
        
        // Fill data
        document.getElementById('delete_id').value = id;
        document.getElementById('delete_nama').textContent = nama;
        document.getElementById('delete_tipe').textContent = tipe;
        document. getElementById('delete_alamat').textContent = alamat;
        document.getElementById('delete_pegawai').textContent = pegawai;
        
        // Show modal
        backdrop. classList.remove('hidden');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            backdrop.classList. remove('opacity-0');
            backdrop. classList.add('opacity-100');
            modalBox.classList. remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        document.body. style.overflow = 'hidden';
    }
    
    function closeModalDelete() {
        const backdrop = document.getElementById('modalBackdropDelete');
        const modal = document.getElementById('modalDelete');
        const modalBox = document.getElementById('modalBoxDelete');
        
        backdrop.classList. remove('opacity-100');
        backdrop.classList.add('opacity-0');
        modalBox.classList. remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            backdrop.classList. add('hidden');
            modal.classList. add('hidden');
            modal.classList. remove('flex');
        }, 300);
        
        document.body.style. overflow = 'auto';
    }
    
    function confirmDelete() {
        const id = document. getElementById('delete_id').value;
        console.log('Delete Kantor ID:', id);
        alert('Kantor berhasil dihapus!');
        closeModalDelete();
    }
    
    document.getElementById('modalBackdropDelete').addEventListener('click', closeModalDelete);
</script>