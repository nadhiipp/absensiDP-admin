<!-- Modal Create Kantor -->
<div id="modalCreateKantor" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-xl max-h-[90vh] overflow-hidden">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Tambah Kantor Baru</h3>
            <button onclick="closeModalKantor()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center transition-colors">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-130px)]">
            <form id="formCreateKantor" class="space-y-5">
                @csrf
                
                <!-- Nama Kantor & Tipe -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1. 5">Nama Kantor</label>
                        <input type="text" name="nama_kantor" placeholder="Kantor Cabang Jakarta" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tipe Kantor</label>
                        <select name="tipe_kantor" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 bg-white">
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
                    <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap kantor" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus: ring-blue-500 resize-none"></textarea>
                </div>

                <!-- Telepon & Email -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">No.  Telepon</label>
                        <input type="tel" name="telepon" placeholder="021-12345678" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                        <input type="email" name="email" placeholder="kantor@perusahaan.com" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Jumlah Pegawai & Status -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jumlah Pegawai</label>
                        <input type="number" name="jumlah_pegawai" placeholder="50" min="0"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                        <select name="status" required
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
            <button type="button" onclick="closeModalKantor()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100 transition-colors">
                Batal
            </button>
            <button type="submit" form="formCreateKantor" class="px-5 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-colors">
                Simpan
            </button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document. getElementById('modalCreateKantor').classList.remove('hidden');
        document.getElementById('modalCreateKantor').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModalKantor() {
        document. getElementById('modalCreateKantor').classList.add('hidden');
        document.getElementById('modalCreateKantor').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    document.getElementById('modalCreateKantor').addEventListener('click', function(e) {
        if (e.target === this) closeModalKantor();
    });
    
    document.getElementById('formCreateKantor').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Kantor berhasil ditambahkan!');
        closeModalKantor();
        this.reset();
    });
</script>