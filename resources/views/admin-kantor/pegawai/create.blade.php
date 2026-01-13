<!-- Modal Create -->
<div id="modalCreate" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-xl max-h-[90vh] overflow-hidden" id="modalBoxCreate">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Tambah Pegawai Baru</h3>
            <button onclick="closeModal()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center transition-colors">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-130px)]">
            <form id="formCreate" class="space-y-5">
                @csrf
                
                <!-- NIP & Nama -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">NIP</label>
                        <input type="text" name="nip" placeholder="PGW-2024-001" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama lengkap" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus: ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Email & Telepon -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                        <input type="email" name="email" placeholder="email@perusahaan.com" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">No.  Telepon</label>
                        <input type="tel" name="telepon" placeholder="081234567890" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Departemen & Jabatan -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Departemen</label>
                        <select name="departemen" required
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
                        <input type="text" name="jabatan" placeholder="Jabatan" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus: ring-blue-500">
                    </div>
                </div>

                <!-- Status & Tanggal Masuk -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                        <select name="status" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 bg-white">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Alamat</label>
                    <textarea name="alamat" rows="3" placeholder="Alamat lengkap"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 resize-none"></textarea>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button type="button" onclick="closeModal()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100 transition-colors">
                Batal
            </button>
            <button type="submit" form="formCreate" class="px-5 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-colors">
                Simpan
            </button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document. getElementById('modalCreate').classList.remove('hidden');
        document.getElementById('modalCreate').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        document.getElementById('modalCreate').classList.add('hidden');
        document.getElementById('modalCreate').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    document.getElementById('modalCreate').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });
    
    document.getElementById('formCreate').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Pegawai berhasil ditambahkan! ');
        closeModal();
        this.reset();
    });
</script>