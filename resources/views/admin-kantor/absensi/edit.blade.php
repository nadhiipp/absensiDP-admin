<!-- Modal Edit Absensi -->
<div id="modalEdit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Edit Absensi</h3>
            <button onclick="closeModalEdit()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form id="formEdit" class="space-y-4">
                <input type="hidden" id="edit_no" name="no">
                
                <!-- Info Pegawai -->
                <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl">
                    <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center text-white font-bold" id="edit_avatar">BS</div>
                    <div>
                        <p class="font-semibold text-slate-800" id="edit_nama_display">Budi Santoso</p>
                        <p class="text-sm text-slate-500"><span id="edit_nip_display">PB001</span> • <span id="edit_dept_display">Produksi</span></p>
                    </div>
                </div>

                <input type="hidden" id="edit_nip" name="nip">
                <input type="hidden" id="edit_nama" name="nama">
                <input type="hidden" id="edit_dept" name="dept">

                <!-- Shift -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1. 5">Shift</label>
                    <select name="shift" id="edit_shift" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                        <option value="Pagi">Pagi (07:00 - 15:00)</option>
                        <option value="Siang">Siang (15:00 - 23:00)</option>
                        <option value="Malam">Malam (23:00 - 07:00)</option>
                    </select>
                </div>

                <!-- Jam Masuk & Keluar -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jam Masuk</label>
                        <input type="time" name="masuk" id="edit_masuk"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jam Keluar</label>
                        <input type="time" name="keluar" id="edit_keluar"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500">
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                    <select name="status" id="edit_status" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 bg-white">
                        <option value="Hadir">Hadir</option>
                        <option value="Terlambat">Terlambat</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Alpha">Alpha</option>
                    </select>
                </div>

                <!-- Keterangan -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan</label>
                    <textarea name="ket" id="edit_ket" rows="2" placeholder="Keterangan..."
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 resize-none"></textarea>
                </div>

            </form>
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button onclick="closeModalEdit()" class="px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100">
                Batal
            </button>
            <button type="submit" form="formEdit" class="px-4 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium">
                Simpan
            </button>
        </div>
    </div>
</div>

<script>
function openModalEdit(no, nip, nama, dept, shift, masuk, keluar, status, ket) {
    // Set hidden values
    document. getElementById('edit_no').value = no;
    document.getElementById('edit_nip').value = nip;
    document. getElementById('edit_nama').value = nama;
    document.getElementById('edit_dept').value = dept;
    
    // Set display info
    const initials = nama.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    document.getElementById('edit_avatar').textContent = initials;
    document.getElementById('edit_nama_display').textContent = nama;
    document.getElementById('edit_nip_display').textContent = nip;
    document.getElementById('edit_dept_display').textContent = dept;
    
    // Set form values
    document.getElementById('edit_shift').value = shift;
    document.getElementById('edit_masuk').value = masuk || '';
    document.getElementById('edit_keluar').value = keluar || '';
    document.getElementById('edit_status').value = status;
    document.getElementById('edit_ket').value = ket || '';
    
    // Show modal
    document.getElementById('modalEdit').classList.remove('hidden');
    document.getElementById('modalEdit').classList.add('flex');
    document.body. style.overflow = 'hidden';
}

function closeModalEdit() {
    document.getElementById('modalEdit').classList.add('hidden');
    document.getElementById('modalEdit').classList.remove('flex');
    document.body. style.overflow = 'auto';
}

document.getElementById('modalEdit').addEventListener('click', e => {
    if (e. target === document.getElementById('modalEdit')) closeModalEdit();
});

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeModalEdit();
});

document.getElementById('formEdit').addEventListener('submit', e => {
    e. preventDefault();
    alert('Absensi berhasil diperbarui!');
    closeModalEdit();
});
</script>