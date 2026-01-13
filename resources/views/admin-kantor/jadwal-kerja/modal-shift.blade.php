<!-- Modal Create Shift -->
<div id="modalCreateShift" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Tambah Shift Baru</h3>
            <button onclick="closeModalShift()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>
        <div class="p-6">
            <form id="formCreateShift" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1. 5">Nama Shift</label>
                    <input type="text" name="nama_shift" placeholder="Contoh: Shift Pagi" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jam Mulai</label>
                        <input type="time" name="jam_mulai" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jam Selesai</label>
                        <input type="time" name="jam_selesai" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                    <select name="status" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button onclick="closeModalShift()" class="px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100">Batal</button>
            <button type="submit" form="formCreateShift" class="px-4 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium">Simpan</button>
        </div>
    </div>
</div>

<!-- Modal Edit Shift -->
<div id="modalEditShift" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Edit Shift</h3>
            <button onclick="closeModalEditShift()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>
        <div class="p-6">
            <form id="formEditShift" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Shift</label>
                    <input type="text" name="nama_shift" id="edit_nama_shift" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="edit_jam_mulai" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="edit_jam_selesai" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                    <select name="status" id="edit_status_shift" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button onclick="closeModalEditShift()" class="px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover: bg-slate-100">Batal</button>
            <button type="submit" form="formEditShift" class="px-4 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium">Simpan</button>
        </div>
    </div>
</div>

<script>
function openModalShift() {
    document.getElementById('modalCreateShift').classList.remove('hidden');
    document.getElementById('modalCreateShift').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeModalShift() {
    document.getElementById('modalCreateShift').classList.add('hidden');
    document.getElementById('modalCreateShift').classList.remove('flex');
    document.body.style.overflow = 'auto';
}

function openModalEditShift(nama = 'Shift Pagi', mulai = '07:00', selesai = '15:00', status = 'Aktif') {
    document.getElementById('edit_nama_shift').value = nama;
    document.getElementById('edit_jam_mulai').value = mulai;
    document.getElementById('edit_jam_selesai').value = selesai;
    document.getElementById('edit_status_shift').value = status;
    document.getElementById('modalEditShift').classList.remove('hidden');
    document.getElementById('modalEditShift').classList.add('flex');
    document.body.style. overflow = 'hidden';
}
function closeModalEditShift() {
    document.getElementById('modalEditShift').classList.add('hidden');
    document.getElementById('modalEditShift').classList.remove('flex');
    document.body.style.overflow = 'auto';
}

document.getElementById('modalCreateShift').addEventListener('click', e => { if(e.target === document.getElementById('modalCreateShift')) closeModalShift(); });
document.getElementById('modalEditShift').addEventListener('click', e => { if(e.target === document. getElementById('modalEditShift')) closeModalEditShift(); });

document.getElementById('formCreateShift').addEventListener('submit', e => { e.preventDefault(); alert('Shift berhasil ditambahkan!'); closeModalShift(); });
document.getElementById('formEditShift').addEventListener('submit', e => { e.preventDefault(); alert('Shift berhasil diperbarui!'); closeModalEditShift(); });
</script>