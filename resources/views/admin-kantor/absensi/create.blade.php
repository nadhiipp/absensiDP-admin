<!-- Modal Create Absensi -->
<div id="modalCreate" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Tambah Absen Manual</h3>
            <button onclick="closeModal()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form id="formCreate" class="space-y-4">
                
                <!-- Pegawai -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">NIP</label>
                        <select name="nip" id="nip" required onchange="updatePegawai(this)"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                            <option value="">Pilih NIP</option>
                            <option value="PB001" data-nama="Budi Santoso" data-dept="Produksi">PB001</option>
                            <option value="PB002" data-nama="Siti Aminah" data-dept="Quality Control">PB002</option>
                            <option value="PB003" data-nama="Ahmad Wijaya" data-dept="Warehouse">PB003</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Pegawai</label>
                        <input type="text" id="nama_pegawai" readonly placeholder="Otomatis terisi"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-slate-50 text-slate-600">
                    </div>
                </div>

                <!-- Shift & Tanggal -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Shift</label>
                        <select name="shift" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                            <option value="">Pilih Shift</option>
                            <option value="Pagi">Pagi (07:00 - 15:00)</option>
                            <option value="Siang">Siang (15:00 - 23:00)</option>
                            <option value="Malam">Malam (23:00 - 07:00)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal</label>
                        <input type="date" name="tanggal" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <!-- Jam Masuk & Keluar -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jam Masuk</label>
                        <input type="time" name="jam_masuk"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jam Keluar</label>
                        <input type="time" name="jam_keluar"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500">
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                    <select name="status" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                        <option value="">Pilih Status</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Terlambat">Terlambat</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Alpha">Alpha</option>
                    </select>
                </div>

                <!-- Keterangan -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan (Opsional)</label>
                    <textarea name="keterangan" rows="2" placeholder="Keterangan tambahan..."
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 resize-none"></textarea>
                </div>

            </form>
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button onclick="closeModal()" class="px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100">
                Batal
            </button>
            <button type="submit" form="formCreate" class="px-4 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium">
                Simpan
            </button>
        </div>
    </div>
</div>

<script>
function updatePegawai(select) {
    const opt = select.options[select.selectedIndex];
    document.getElementById('nama_pegawai').value = opt.dataset.nama || '';
}

function openModal() {
    document. getElementById('modalCreate').classList.remove('hidden');
    document.getElementById('modalCreate').classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('modalCreate').classList.add('hidden');
    document.getElementById('modalCreate').classList.remove('flex');
    document.body.style. overflow = 'auto';
}

document.getElementById('modalCreate').addEventListener('click', e => {
    if (e.target === document.getElementById('modalCreate')) closeModal();
});

document.getElementById('formCreate').addEventListener('submit', e => {
    e.preventDefault();
    alert('Absensi berhasil ditambahkan! ');
    closeModal();
    e.target.reset();
    document.getElementById('nama_pegawai').value = '';
});
</script>