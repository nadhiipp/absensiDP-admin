<!-- Modal Backdrop Create -->
<div id="modalBackdrop" class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Modal Create Content -->
<div id="modalCreate" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalBox">
        
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-blue-500 to-blue-600">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="bi bi-calendar-plus text-white text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white">Tambah Absen Manual</h3>
                    <p class="text-blue-100 text-sm">Input absensi pegawai secara manual</p>
                </div>
            </div>
            <button onclick="closeModal()" class="w-10 h-10 rounded-lg bg-white/20 hover:bg-white/30 flex items-center justify-center text-white transition-all">
                <i class="bi bi-x-lg text-lg"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-180px)]">
            <form id="formCreateAbsensi" action="#" method="POST">
                @csrf
                
                <!-- Pilih Pegawai Section -->
                <div class="bg-slate-50 rounded-xl p-4 mb-5">
                    <h4 class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                        <i class="bi bi-person-badge text-blue-500"></i>
                        Data Pegawai
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                NIP <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="bi bi-hash absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <select name="nip" 
                                        id="nip"
                                        required
                                        onchange="updateNamaPegawai(this)"
                                        class="w-full pl-11 pr-10 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all appearance-none cursor-pointer">
                                    <option value="">Pilih NIP</option>
                                    <option value="PB001" data-nama="Budi Santoso" data-dept="Produksi">PB001</option>
                                    <option value="PB002" data-nama="Siti Aminah" data-dept="Quality Control">PB002</option>
                                    <option value="PB003" data-nama="Ahmad Wijaya" data-dept="Warehouse">PB003</option>
                                    <option value="PB004" data-nama="Dewi Lestari" data-dept="HRD">PB004</option>
                                    <option value="PB005" data-nama="Rizki Pratama" data-dept="Maintenance">PB005</option>
                                </select>
                                <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Nama Pegawai
                            </label>
                            <div class="relative">
                                <i class="bi bi-person absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input type="text" 
                                       name="nama_pegawai" 
                                       id="nama_pegawai"
                                       placeholder="Otomatis terisi"
                                       readonly
                                       class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-slate-100 text-slate-600">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Absensi Section -->
                <div class="bg-slate-50 rounded-xl p-4 mb-5">
                    <h4 class="text-sm font-semibold text-slate-700 mb-3 flex items-center gap-2">
                        <i class="bi bi-clock text-blue-500"></i>
                        Detail Absensi
                    </h4>
                    
                    <!-- Row:  Departemen & Shift -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Departemen <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="bi bi-building absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <select name="departemen" 
                                        id="departemen"
                                        required
                                        class="w-full pl-11 pr-10 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all appearance-none cursor-pointer">
                                    <option value="">Pilih Departemen</option>
                                    <option value="Produksi">Produksi</option>
                                    <option value="Quality Control">Quality Control</option>
                                    <option value="Warehouse">Warehouse</option>
                                    <option value="HRD">HRD</option>
                                    <option value="Maintenance">Maintenance</option>
                                </select>
                                <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Shift <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="bi bi-clock-history absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <select name="shift" 
                                        id="shift"
                                        required
                                        class="w-full pl-11 pr-10 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100 transition-all appearance-none cursor-pointer">
                                    <option value="">Pilih Shift</option>
                                    <option value="Pagi">Pagi (07:00 - 15:00)</option>
                                    <option value="Siang">Siang (15:00 - 23:00)</option>
                                    <option value="Malam">Malam (23:00 - 07:00)</option>
                                </select>
                                <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Row:  Jam Masuk & Jam Keluar -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Jam Masuk
                            </label>
                            <div class="relative">
                                <i class="bi bi-box-arrow-in-right absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input type="time" 
                                       name="jam_masuk" 
                                       id="jam_masuk"
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
                                       id="jam_keluar"
                                       class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus: outline-none focus: border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Status Kehadiran <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="flex items-center justify-center gap-2 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[:checked]:border-green-500 has-[:checked]:bg-green-50">
                                <input type="radio" name="status" value="Hadir" required class="w-4 h-4 text-green-500 focus:ring-green-500">
                                <span class="text-sm font-medium text-slate-700">Hadir</span>
                            </label>
                            <label class="flex items-center justify-center gap-2 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[:checked]: border-amber-500 has-[:checked]:bg-amber-50">
                                <input type="radio" name="status" value="Terlambat" class="w-4 h-4 text-amber-500 focus:ring-amber-500">
                                <span class="text-sm font-medium text-slate-700">Terlambat</span>
                            </label>
                            <label class="flex items-center justify-center gap-2 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[:checked]:border-blue-500 has-[: checked]:bg-blue-50">
                                <input type="radio" name="status" value="Izin" class="w-4 h-4 text-blue-500 focus: ring-blue-500">
                                <span class="text-sm font-medium text-slate-700">Izin</span>
                            </label>
                            <label class="flex items-center justify-center gap-2 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[: checked]:border-red-500 has-[:checked]:bg-red-50">
                                <input type="radio" name="status" value="Sakit" class="w-4 h-4 text-red-500 focus: ring-red-500">
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
                                      id="keterangan"
                                      rows="2"
                                      placeholder="Masukkan keterangan (opsional)"
                                      class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex gap-3">
                        <i class="bi bi-info-circle-fill text-blue-500 text-lg flex-shrink-0"></i>
                        <div>
                            <h4 class="text-sm font-medium text-blue-800">Informasi</h4>
                            <p class="text-sm text-blue-600 mt-1">Absensi manual akan tercatat dalam sistem dengan penanda khusus.  Pastikan data yang dimasukkan sudah benar. </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-slate-200 bg-slate-50">
            <button type="button" onclick="closeModal()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl text-sm font-medium hover:bg-slate-100 transition-all inline-flex items-center gap-2">
                <i class="bi bi-x-lg"></i>
                Batal
            </button>
            <button type="button" onclick="resetFormAbsensi()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl text-sm font-medium hover: bg-slate-100 transition-all inline-flex items-center gap-2">
                <i class="bi bi-arrow-counterclockwise"></i>
                Reset
            </button>
            <button type="submit" form="formCreateAbsensi" class="px-6 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-medium transition-all inline-flex items-center gap-2 shadow-lg shadow-blue-500/30">
                <i class="bi bi-check-lg"></i>
                Simpan Absensi
            </button>
        </div>
    </div>
</div>

<script>
    function updateNamaPegawai(select) {
        const selectedOption = select.options[select.selectedIndex];
        const nama = selectedOption.getAttribute('data-nama') || '';
        const dept = selectedOption.getAttribute('data-dept') || '';
        
        document.getElementById('nama_pegawai').value = nama;
        if (dept) {
            document.getElementById('departemen').value = dept;
        }
    }

    function openModal() {
        const backdrop = document.getElementById('modalBackdrop');
        const modal = document.getElementById('modalCreate');
        const modalBox = document.getElementById('modalBox');
        
        backdrop.classList.remove('hidden');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        const backdrop = document.getElementById('modalBackdrop');
        const modal = document.getElementById('modalCreate');
        const modalBox = document.getElementById('modalBox');
        
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList. add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            backdrop.classList. add('hidden');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
        
        document. body.style.overflow = 'auto';
    }
    
    function resetFormAbsensi() {
        document.getElementById('formCreateAbsensi').reset();
        document.getElementById('nama_pegawai').value = '';
    }
    
    document.getElementById('modalBackdrop').addEventListener('click', closeModal);
    
    document.getElementById('formCreateAbsensi').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);
        console.log('Data Absensi:', data);
        alert('Absensi berhasil ditambahkan!');
        closeModal();
        resetFormAbsensi();
    });
</script>