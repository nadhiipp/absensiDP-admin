<!-- Modal Backdrop Edit -->
<div id="modalBackdropEdit" class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Modal Edit Content -->
<div id="modalEdit" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalBoxEdit">
        
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-blue-500 to-indigo-600">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="bi bi-pencil-square text-white text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white">Edit Data Absensi</h3>
                    <p class="text-blue-100 text-sm">Perbarui data kehadiran pegawai</p>
                </div>
            </div>
            <button onclick="closeModalEdit()" class="w-10 h-10 rounded-lg bg-white/20 hover: bg-white/30 flex items-center justify-center text-white transition-all">
                <i class="bi bi-x-lg text-lg"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-180px)]">
            <form id="formEditAbsensi" action="#" method="POST">
                @csrf
                @method('PUT')
                
                <input type="hidden" name="id" id="edit_id">
                
                <!-- Info Pegawai (Read Only) -->
                <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl p-4 mb-5 border border-slate-200">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-blue-500 rounded-xl flex items-center justify-center text-white text-lg font-bold" id="edit_avatar">
                            BS
                        </div>
                        <div class="flex-1">
                            <h4 class="text-base font-semibold text-slate-800" id="edit_nama_display">Budi Santoso</h4>
                            <div class="flex items-center gap-3 mt-1">
                                <span class="text-sm text-slate-500 flex items-center gap-1">
                                    <i class="bi bi-hash"></i>
                                    <span id="edit_nip_display">PB001</span>
                                </span>
                                <span class="text-sm text-slate-500 flex items-center gap-1">
                                    <i class="bi bi-building"></i>
                                    <span id="edit_dept_display">Produksi</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="nip" id="edit_nip">
                <input type="hidden" name="nama_pegawai" id="edit_nama">
                <input type="hidden" name="departemen" id="edit_departemen">

                <!-- Detail Absensi Section -->
                <div class="bg-slate-50 rounded-xl p-4 mb-5">
                    <h4 class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                        <i class="bi bi-clock text-blue-500"></i>
                        Detail Absensi
                    </h4>
                    
                    <!-- Row: Shift & Tanggal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Shift <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="bi bi-clock-history absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <select name="shift" 
                                        id="edit_shift"
                                        required
                                        class="w-full pl-11 pr-10 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all appearance-none cursor-pointer">
                                    <option value="">Pilih Shift</option>
                                    <option value="Pagi">Pagi (07:00 - 15:00)</option>
                                    <option value="Siang">Siang (15:00 - 23:00)</option>
                                    <option value="Malam">Malam (23:00 - 07:00)</option>
                                </select>
                                <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Tanggal
                            </label>
                            <div class="relative">
                                <i class="bi bi-calendar3 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input type="date" 
                                       name="tanggal" 
                                       id="edit_tanggal"
                                       class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-slate-100 focus:outline-none"
                                       readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Row:  Jam Masuk & Jam Keluar -->
                    <div class="grid grid-cols-1 md: grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Jam Masuk
                            </label>
                            <div class="relative">
                                <i class="bi bi-box-arrow-in-right absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input type="time" 
                                       name="jam_masuk" 
                                       id="edit_jam_masuk"
                                       class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus: ring-2 focus:ring-blue-100 transition-all">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Jam Keluar
                            </label>
                            <div class="relative">
                                <i class="bi bi-box-arrow-right absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input type="time" 
                                       name="jam_keluar" 
                                       id="edit_jam_keluar"
                                       class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus: ring-2 focus:ring-blue-100 transition-all">
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Status Kehadiran <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-2 md: grid-cols-4 gap-3">
                            <label class="flex items-center justify-center gap-2 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover: bg-slate-50 transition-all has-[:checked]:border-green-500 has-[:checked]: bg-green-50">
                                <input type="radio" name="status" value="Hadir" id="edit_status_hadir" class="w-4 h-4 text-green-500 focus:ring-green-500">
                                <span class="text-sm font-medium text-slate-700">Hadir</span>
                            </label>
                            <label class="flex items-center justify-center gap-2 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[:checked]: border-amber-500 has-[:checked]:bg-amber-50">
                                <input type="radio" name="status" value="Terlambat" id="edit_status_terlambat" class="w-4 h-4 text-amber-500 focus:ring-amber-500">
                                <span class="text-sm font-medium text-slate-700">Terlambat</span>
                            </label>
                            <label class="flex items-center justify-center gap-2 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[: checked]:border-blue-500 has-[:checked]:bg-blue-50">
                                <input type="radio" name="status" value="Izin" id="edit_status_izin" class="w-4 h-4 text-blue-500 focus: ring-blue-500">
                                <span class="text-sm font-medium text-slate-700">Izin</span>
                            </label>
                            <label class="flex items-center justify-center gap-2 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[: checked]:border-red-500 has-[:checked]:bg-red-50">
                                <input type="radio" name="status" value="Sakit" id="edit_status_sakit" class="w-4 h-4 text-red-500 focus: ring-red-500">
                                <span class="text-sm font-medium text-slate-700">Sakit</span>
                            </label>
                        </div>
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Keterangan
                        </label>
                        <div class="relative">
                            <i class="bi bi-chat-left-text absolute left-4 top-3 text-slate-400"></i>
                            <textarea name="keterangan" 
                                      id="edit_keterangan"
                                      rows="2"
                                      placeholder="Masukkan keterangan"
                                      class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-4">
                    <div class="flex gap-3">
                        <i class="bi bi-lightbulb-fill text-indigo-500 text-lg flex-shrink-0"></i>
                        <div>
                            <h4 class="text-sm font-medium text-indigo-800">Perhatian</h4>
                            <p class="text-sm text-indigo-600 mt-1">Perubahan data absensi akan tercatat dalam log sistem.  Pastikan perubahan sudah sesuai.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-slate-200 bg-slate-50">
            <button type="button" onclick="closeModalEdit()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl text-sm font-medium hover:bg-slate-100 transition-all inline-flex items-center gap-2">
                <i class="bi bi-x-lg"></i>
                Batal
            </button>
            <button type="submit" form="formEditAbsensi" class="px-6 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-medium transition-all inline-flex items-center gap-2 shadow-lg shadow-blue-500/30">
                <i class="bi bi-check-lg"></i>
                Simpan Perubahan
            </button>
        </div>
    </div>
</div>

<script>
    function openModalEdit(id, nip, nama, departemen, shift, jam_masuk, jam_keluar, status, keterangan) {
        const backdrop = document.getElementById('modalBackdropEdit');
        const modal = document.getElementById('modalEdit');
        const modalBox = document.getElementById('modalBoxEdit');
        
        // Fill form with data
        document. getElementById('edit_id').value = id;
        document.getElementById('edit_nip').value = nip;
        document. getElementById('edit_nama').value = nama;
        document.getElementById('edit_departemen').value = departemen;
        document.getElementById('edit_shift').value = shift;
        document.getElementById('edit_jam_masuk').value = jam_masuk || '';
        document. getElementById('edit_jam_keluar').value = jam_keluar || '';
        document.getElementById('edit_keterangan').value = keterangan || '';
        
        // Update display
        document.getElementById('edit_nip_display').textContent = nip;
        document.getElementById('edit_nama_display').textContent = nama;
        document.getElementById('edit_dept_display').textContent = departemen;
        
        // Set avatar initials
        const initials = nama.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
        document.getElementById('edit_avatar').textContent = initials;
        
        // Set status radio
        document.querySelectorAll('input[name="status"]').forEach(radio => {
            radio. checked = radio.value === status;
        });
        
        // Set today's date
        document. getElementById('edit_tanggal').value = new Date().toISOString().split('T')[0];
        
        // Show modal
        backdrop. classList.remove('hidden');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            backdrop. classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        document.body.style.overflow = 'hidden';
    }
    
    function closeModalEdit() {
        const backdrop = document.getElementById('modalBackdropEdit');
        const modal = document.getElementById('modalEdit');
        const modalBox = document. getElementById('modalBoxEdit');
        
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            backdrop.classList.add('hidden');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
        
        document. body.style.overflow = 'auto';
    }
    
    document.getElementById('modalBackdropEdit').addEventListener('click', closeModalEdit);
    
    document.getElementById('formEditAbsensi').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const data = Object. fromEntries(formData);
        console.log('Update Absensi:', data);
        alert('Data absensi berhasil diperbarui!');
        closeModalEdit();
    });
</script>