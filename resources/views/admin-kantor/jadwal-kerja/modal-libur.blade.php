<!-- Modal Create Libur -->
<div id="modalLibur" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Tambah Hari Libur</h3>
            <button onclick="closeModalLibur()" class="w-8 h-8 rounded-lg hover: bg-slate-100 flex items-center justify-center">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>
        <div class="p-6">
            <form id="formLibur" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Hari Libur</label>
                    <input type="text" name="nama_libur" placeholder="Contoh:  Tahun Baru Masehi" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal</label>
                    <input type="date" name="tanggal_libur" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan (Opsional)</label>
                    <textarea name="keterangan" rows="2" placeholder="Keterangan tambahan..."
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 resize-none"></textarea>
                </div>
            </form>
        </div>
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button onclick="closeModalLibur()" class="px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100">Batal</button>
            <button type="submit" form="formLibur" class="px-4 py-2.5 bg-red-500 hover: bg-red-600 text-white rounded-lg text-sm font-medium">Simpan</button>
        </div>
    </div>
</div>

<script>
function openModalLibur() {
    document. getElementById('modalLibur').classList.remove('hidden');
    document.getElementById('modalLibur').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeModalLibur() {
    document.getElementById('modalLibur').classList.add('hidden');
    document.getElementById('modalLibur').classList.remove('flex');
    document.body. style.overflow = 'auto';
}
document.getElementById('modalLibur').addEventListener('click', e => { if(e.target === document.getElementById('modalLibur')) closeModalLibur(); });
document.getElementById('formLibur').addEventListener('submit', e => { e.preventDefault(); alert('Hari libur berhasil ditambahkan!'); closeModalLibur(); document.getElementById('formLibur').reset(); });
</script>