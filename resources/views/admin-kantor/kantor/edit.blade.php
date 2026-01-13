<!-- Modal Edit Kantor -->
<div id="modalEditKantor" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-xl max-h-[90vh] overflow-hidden">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Edit Data Kantor</h3>
            <button onclick="closeModalEditKantor()" class="w-8 h-8 rounded-lg hover: bg-slate-100 flex items-center justify-center transition-colors">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-130px)]">
            <form id="formEditKantor" class="space-y-5">
                @csrf
                
                <!-- Nama Kantor & Tipe -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Kantor</label>
                        <input type="text" name="nama_kantor" id="edit_nama_kantor" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tipe Kantor</label>
                        <select name="tipe_kantor" id="edit_tipe_kantor" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus: ring-1 focus:ring-blue-500 bg-white">
                            <option value="">Pilih Tipe</option>
                            <option value="Pusat">Pusat</option>
                            <option value="Cabang">Cabang</option>
                            <option value="Regional">Regional</option>
                            <option value="Perwakilan">Perwakilan</option>
                        </select>
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Alamat Lengkap</label>
                    <textarea name="alamat" id="edit_alamat_kantor" rows="3" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 resize-none"></textarea>
                </div>

                <!-- Telepon & Email -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">No.  Telepon</label>
                        <input type="tel" name="telepon" id="edit_telepon_kantor" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                        <input type="email" name="email" id="edit_email_kantor" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus: ring-blue-500">
                    </div>
                </div>

                <!-- Jumlah Pegawai & Status -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jumlah Pegawai</label>
                        <input type="number" name="jumlah_pegawai" id="edit_jumlah_pegawai" min="0"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                        <select name="status" id="edit_status_kantor" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 bg-white">
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button type="button" onclick="closeModalEditKantor()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100 transition-colors">
                Batal
            </button>
            <button type="submit" form="formEditKantor" class="px-5 py-2.5 bg-blue-500 hover: bg-blue-600 text-white rounded-lg text-sm font-medium transition-colors">
                Simpan Perubahan
            </button>
        </div>
    </div>
</div>

<script>
    function openModalEdit(data = null) {
        const kantor = data || {
            nama_kantor: 'Kantor Pusat Jakarta',
            tipe_kantor: 'Pusat',
            alamat:  'Jl. Sudirman No. 123, Jakarta Pusat',
            telepon: '021-5551234',
            email: 'pusat@kantor.com',
            jumlah_pegawai: 150,
            status:  'Aktif'
        };
        
        document. getElementById('edit_nama_kantor').value = kantor.nama_kantor;
        document. getElementById('edit_tipe_kantor').value = kantor. tipe_kantor;
        document. getElementById('edit_alamat_kantor').value = kantor. alamat;
        document.getElementById('edit_telepon_kantor').value = kantor.telepon;
        document.getElementById('edit_email_kantor').value = kantor.email;
        document.getElementById('edit_jumlah_pegawai').value = kantor.jumlah_pegawai;
        document.getElementById('edit_status_kantor').value = kantor.status;
        
        document. getElementById('modalEditKantor').classList.remove('hidden');
        document.getElementById('modalEditKantor').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModalEditKantor() {
        document. getElementById('modalEditKantor').classList.add('hidden');
        document.getElementById('modalEditKantor').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    document.getElementById('modalEditKantor').addEventListener('click', function(e) {
        if (e.target === this) closeModalEditKantor();
    });
    
    document.getElementById('formEditKantor').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Data kantor berhasil diperbarui!');
        closeModalEditKantor();
    });
</script>