<!-- Modal Jadwal Kerja -->
<div id="modalJadwal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Buat Jadwal Kerja</h3>
            <button onclick="closeModalJadwal()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>
        <div class="p-6">
            <form id="formJadwal" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Pilih Pegawai</label>
                    <select name="pegawai" required class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                        <option value="">Pilih Pegawai</option>
                        <option value="1">Budi Santoso - Produksi</option>
                        <option value="2">Siti Aminah - Quality Control</option>
                        <option value="3">Ahmad Wijaya - Warehouse</option>
                        <option value="all">Semua Pegawai</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Pilih Shift</label>
                    <select name="shift" required class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                        <option value="">Pilih Shift</option>
                        <option value="pagi">Shift Pagi (07:00 - 15:00)</option>
                        <option value="siang">Shift Siang (15:00 - 23:00)</option>
                        <option value="malam">Shift Malam (23:00 - 07:00)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Catatan (Opsional)</label>
                    <textarea name="catatan" rows="2" placeholder="Catatan tambahan..."
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 resize-none"></textarea>
                </div>
            </form>
        </div>
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button onclick="closeModalJadwal()" class="px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100">Batal</button>
            <button type="submit" form="formJadwal" class="px-4 py-2.5 bg-blue-500 hover: bg-blue-600 text-white rounded-lg text-sm font-medium">Simpan</button>
        </div>
    </div>
</div>

<script>
function openModalJadwal() {
    document.getElementById('modalJadwal').classList.remove('hidden');
    document.getElementById('modalJadwal').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeModalJadwal() {
    document. getElementById('modalJadwal').classList.add('hidden');
    document.getElementById('modalJadwal').classList.remove('flex');
    document.body.style.overflow = 'auto';
}
document.getElementById('modalJadwal').addEventListener('click', e => { if(e.target === document.getElementById('modalJadwal')) closeModalJadwal(); });
document.getElementById('formJadwal').addEventListener('submit', e => { e.preventDefault(); alert('Jadwal berhasil dibuat!'); closeModalJadwal(); document.getElementById('formJadwal').reset(); });
</script>