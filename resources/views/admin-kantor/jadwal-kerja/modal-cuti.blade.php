<!-- Modal Create Cuti -->
<div id="modalCuti" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Tambah Cuti Bersama</h3>
            <button onclick="closeModalCuti()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>
        <div class="p-6">
            <form id="formCuti" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Cuti Bersama</label>
                    <input type="text" name="nama_cuti" placeholder="Contoh: Cuti Bersama Idul Fitri" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan (Opsional)</label>
                    <textarea name="keterangan" rows="2" placeholder="Keterangan tambahan..."
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 resize-none"></textarea>
                </div>
            </form>
        </div>
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button onclick="closeModalCuti()" class="px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100">Batal</button>
            <button type="submit" form="formCuti" class="px-4 py-2.5 bg-amber-500 hover: bg-amber-600 text-white rounded-lg text-sm font-medium">Simpan</button>
        </div>
    </div>
</div>

<script>
function openModalCuti() {
    document. getElementById('modalCuti').classList.remove('hidden');
    document.getElementById('modalCuti').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeModalCuti() {
    document.getElementById('modalCuti').classList.add('hidden');
    document.getElementById('modalCuti').classList.remove('flex');
    document.body. style.overflow = 'auto';
}
document.getElementById('modalCuti').addEventListener('click', e => { if(e. target === document.getElementById('modalCuti')) closeModalCuti(); });
document.getElementById('formCuti').addEventListener('submit', e => { e.preventDefault(); alert('Cuti bersama berhasil ditambahkan!'); closeModalCuti(); document.getElementById('formCuti').reset(); });
</script>