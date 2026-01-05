<!-- Modal Backdrop Edit -->
<div id="modalBackdropEdit" class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Modal Edit Content -->
<div id="modalEdit" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalBoxEdit">
        
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-blue-500 to-blue-600">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="bi bi-pencil-square text-white text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white">Edit Data Pegawai</h3>
                    <p class="text-blue-100 text-sm">Perbarui informasi pegawai</p>
                </div>
            </div>
            <button onclick="closeModalEdit()" class="w-10 h-10 rounded-lg bg-white/20 hover:bg-white/30 flex items-center justify-center text-white transition-all">
                <i class="bi bi-x-lg text-lg"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-180px)]">
            <form id="formEditPegawai" action="#" method="POST">
                @csrf
                @method('PUT')
                
                <input type="hidden" name="id" id="edit_id">
                
                <!-- Row 1: NIP & Nama -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            NIP <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-person-badge absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" 
                                   name="nip" 
                                   id="edit_nip"
                                   placeholder="Contoh: PB001"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus: outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all"
                                   readonly>
                        </div>
                        <p class="text-xs text-slate-400 mt-1">NIP tidak dapat diubah</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Nama Pegawai <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-person absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" 
                                   name="nama" 
                                   id="edit_nama"
                                   placeholder="Masukkan nama lengkap"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100 transition-all">
                        </div>
                    </div>
                </div>

                <!-- Row 2: Departemen & Jabatan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Departemen <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-building absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <select name="departemen" 
                                    id="edit_departemen"
                                    required
                                    class="w-full pl-11 pr-10 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all appearance-none cursor-pointer">
                                <option value="">Pilih Departemen</option>
                                <option value="Produksi">Produksi</option>
                                <option value="Quality Control">Quality Control</option>
                                <option value="Warehouse">Warehouse</option>
                                <option value="HRD">HRD</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Finance">Finance</option>
                            </select>
                            <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Jabatan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-briefcase absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <select name="jabatan" 
                                    id="edit_jabatan"
                                    required
                                    class="w-full pl-11 pr-10 py-3 border border-slate-200 rounded-xl text-sm bg-white focus: outline-none focus: border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all appearance-none cursor-pointer">
                                <option value="">Pilih Jabatan</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Staff">Staff</option>
                                <option value="Operator Mesin">Operator Mesin</option>
                                <option value="Teknisi">Teknisi</option>
                                <option value="QC Inspector">QC Inspector</option>
                                <option value="Admin">Admin</option>
                            </select>
                            <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                        </div>
                    </div>
                </div>

                <!-- Row 3: Telepon & Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Nomor Telepon <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-telephone absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="tel" 
                                   name="telepon" 
                                   id="edit_telepon"
                                   placeholder="Contoh: 081234567890"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus: outline-none focus: border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="email" 
                                   name="email" 
                                   id="edit_email"
                                   placeholder="Contoh: nama@perusahaan.com"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus: outline-none focus: border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
                        </div>
                    </div>
                </div>

                <!-- Row 4: Tanggal Masuk & Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Tanggal Masuk <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-calendar-event absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="date" 
                                   name="tanggal_masuk" 
                                   id="edit_tanggal_masuk"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100 transition-all">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-toggle-on absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <select name="status" 
                                    id="edit_status"
                                    required
                                    class="w-full pl-11 pr-10 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all appearance-none cursor-pointer">
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                        </div>
                    </div>
                </div>

                <!-- Warning Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex gap-3">
                        <i class="bi bi-exclamation-triangle-fill text-blue-500 text-lg flex-shrink-0"></i>
                        <div>
                            <h4 class="text-sm font-medium text-blue-800">Perhatian</h4>
                            <p class="text-sm text-blue-600 mt-1">Perubahan data akan langsung tersimpan.  Pastikan data yang dimasukkan sudah benar sebelum menyimpan.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-slate-200 bg-slate-50">
            <button type="button" onclick="closeModalEdit()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl text-sm font-medium hover:bg-slate-100 transition-all inline-flex items-center gap-2">
                <i class="bi bi-x-lg"></i>
                Batal
            </button>
            <button type="submit" form="formEditPegawai" class="px-6 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-medium transition-all inline-flex items-center gap-2 shadow-lg shadow-blue-500/30">
                <i class="bi bi-check-lg"></i>
                Simpan Perubahan
            </button>
        </div>
    </div>
</div>

<script>
    // Open Modal Edit
    function openModalEdit(nip, nama, departemen, jabatan, telepon, email, tanggal_masuk, status) {
        const backdrop = document.getElementById('modalBackdropEdit');
        const modal = document.getElementById('modalEdit');
        const modalBox = document.getElementById('modalBoxEdit');
        
        // Fill form with data
        document. getElementById('edit_nip').value = nip;
        document.getElementById('edit_nama').value = nama;
        document. getElementById('edit_departemen').value = departemen;
        document.getElementById('edit_jabatan').value = jabatan;
        document.getElementById('edit_telepon').value = telepon || '';
        document. getElementById('edit_email').value = email || '';
        document. getElementById('edit_tanggal_masuk').value = tanggal_masuk || '';
        document. getElementById('edit_status').value = status;
        
        // Show modal
        backdrop. classList.remove('hidden');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        document.body.style. overflow = 'hidden';
    }
    
    // Close Modal Edit
    function closeModalEdit() {
        const backdrop = document. getElementById('modalBackdropEdit');
        const modal = document. getElementById('modalEdit');
        const modalBox = document.getElementById('modalBoxEdit');
        
        backdrop. classList. remove('opacity-100');
        backdrop.classList.add('opacity-0');
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            backdrop.classList. add('hidden');
            modal.classList. add('hidden');
            modal.classList. remove('flex');
        }, 300);
        
        document.body.style. overflow = 'auto';
    }
    
    // Close modal when clicking backdrop
    document.getElementById('modalBackdropEdit').addEventListener('click', closeModalEdit);
    
    // Form Edit Submit Handler
    document. getElementById('formEditPegawai').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = Object. fromEntries(formData);
        
        console.log('Update Pegawai:', data);
        
        alert('Data pegawai berhasil diperbarui! ');
        
        closeModalEdit();
        // Reload page or update table
        // location.reload();
    });
</script>