<!-- Modal Create Event -->
<div id="modalEvent" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800">Tambah Event</h3>
            <button onclick="closeModalEvent()" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center">
                <i class="bi bi-x-lg text-slate-400"></i>
            </button>
        </div>
        <div class="p-6">
            <form id="formEvent" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Event</label>
                    <input type="text" name="nama_event" placeholder="Contoh: Meeting Bulanan" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal</label>
                        <input type="date" name="tanggal_event" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Waktu</label>
                        <input type="time" name="waktu_event" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Contoh: Ruang Meeting Lt. 3" required
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus: outline-none focus: border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan (Opsional)</label>
                    <textarea name="keterangan" rows="2" placeholder="Deskripsi event..."
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 resize-none"></textarea>
                </div>
            </form>
        </div>
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50">
            <button onclick="closeModalEvent()" class="px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-100">Batal</button>
            <button type="submit" form="formEvent" class="px-4 py-2.5 bg-green-500 hover: bg-green-600 text-white rounded-lg text-sm font-medium">Simpan</button>
        </div>
    </div>
</div>

<script>
function openModalEvent() {
    document.getElementById('modalEvent').classList.remove('hidden');
    document.getElementById('modalEvent').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeModalEvent() {
    document.getElementById('modalEvent').classList.add('hidden');
    document.getElementById('modalEvent').classList.remove('flex');
    document.body.style.overflow = 'auto';
}
document.getElementById('modalEvent').addEventListener('click', e => { if(e.target === document.getElementById('modalEvent')) closeModalEvent(); });
document.getElementById('formEvent').addEventListener('submit', e => { e.preventDefault(); alert('Event berhasil ditambahkan!'); closeModalEvent(); document.getElementById('formEvent').reset(); });
</script>