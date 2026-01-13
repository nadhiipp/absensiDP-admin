<!-- Modal Edit -->
<div id="modalEdit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-xl max-h-[90vh] overflow-hidden">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Edit Profil Pegawai</h3>
            <button onclick="closeModalEdit()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center transition-colors">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-130px)]">
            <form id="formEdit" class="space-y-5">
                @csrf
                
                <!-- NIP & Nama -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">NIP</label>
                        <input type="text" name="nip" id="edit_nip" readonly
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-slate-50 text-slate-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" name="nama" id="edit_nama" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus: ring-blue-500">
                    </div>
                </div>

                <!-- Email & Telepon -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                        <input type="email" name="email" id="edit_email" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus: ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">No. Telepon</label>
                        <input type="tel" name="telepon" id="edit_telepon" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Departemen & Jabatan -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Departemen</label>
                        <select name="departemen" id="edit_departemen" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus: ring-blue-500 bg-white">
                            <option value="">Pilih Departemen</option>
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                            <option value="Human Resources">Human Resources</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Produksi">Produksi</option>
                            <option value="Quality Control">Quality Control</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jabatan</label>
                        <input type="text" name="jabatan" id="edit_jabatan" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Status & Tanggal Masuk -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                        <select name="status" id="edit_status" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500 focus:ring-1 focus:ring-blue-500 bg-white">
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" id="edit_tanggal_masuk" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus: ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Alamat</label>
                    <textarea name="alamat" id="edit_alamat" rows="3"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 resize-none"></textarea>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button type="button" onclick="closeModalEdit()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover: bg-slate-100 transition-colors">
                Batal
            </button>
            <button type="submit" form="formEdit" class="px-5 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-colors">
                Simpan Perubahan
            </button>
        </div>
    </div>
</div>

<script>
    function openModalEdit(data = null) {
        // Default dummy data jika tidak ada parameter
        const pegawai = data || {
            nip: 'PGW-2024-001',
            nama: 'Budi Santoso',
            email: 'budi. santoso@perusahaan.com',
            telepon:  '081234567890',
            departemen: 'Teknologi Informasi',
            jabatan:  'Senior Developer',
            status: 'Aktif',
            tanggal_masuk: '2020-03-15',
            alamat: 'Jl.  Sudirman No. 123, Jakarta Selatan'
        };
        
        // Fill form
        document.getElementById('edit_nip').value = pegawai. nip;
        document.getElementById('edit_nama').value = pegawai.nama;
        document. getElementById('edit_email').value = pegawai.email;
        document.getElementById('edit_telepon').value = pegawai.telepon;
        document.getElementById('edit_departemen').value = pegawai.departemen;
        document.getElementById('edit_jabatan').value = pegawai.jabatan;
        document.getElementById('edit_status').value = pegawai. status;
        document.getElementById('edit_tanggal_masuk').value = pegawai.tanggal_masuk;
        document.getElementById('edit_alamat').value = pegawai.alamat;
        
        document.getElementById('modalEdit').classList.remove('hidden');
        document.getElementById('modalEdit').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModalEdit() {
        document.getElementById('modalEdit').classList.add('hidden');
        document.getElementById('modalEdit').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    document.getElementById('modalEdit').addEventListener('click', function(e) {
        if (e.target === this) closeModalEdit();
    });
    
    document. getElementById('formEdit').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Data berhasil diperbarui!');
        closeModalEdit();
    });
</script>