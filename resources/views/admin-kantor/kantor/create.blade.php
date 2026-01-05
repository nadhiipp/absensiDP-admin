<!-- Modal Backdrop Create -->
<div id="modalBackdrop" class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Modal Create Content -->
<div id="modalCreate" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalBox">
        
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-blue-500 to-blue-600">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="bi bi-building-add text-white text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white">Tambah Kantor Baru</h3>
                    <p class="text-blue-100 text-sm">Lengkapi data kantor di bawah ini</p>
                </div>
            </div>
            <button onclick="closeModal()" class="w-10 h-10 rounded-lg bg-white/20 hover:bg-white/30 flex items-center justify-center text-white transition-all">
                <i class="bi bi-x-lg text-lg"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-180px)]">
            <form id="formCreateKantor" action="#" method="POST">
                @csrf
                
                <!-- Row 1: Nama Kantor & Tipe -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Nama Kantor <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-building absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" 
                                   name="nama_kantor" 
                                   id="nama_kantor"
                                   placeholder="Contoh: Kantor Cabang Jakarta"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Tipe Kantor <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-diagram-3 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <select name="tipe" 
                                    id="tipe"
                                    required
                                    class="w-full pl-11 pr-10 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all appearance-none cursor-pointer">
                                <option value="">Pilih Tipe Kantor</option>
                                <option value="Pusat">Pusat</option>
                                <option value="Cabang">Cabang</option>
                                <option value="Regional">Regional</option>
                                <option value="Perwakilan">Perwakilan</option>
                            </select>
                            <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                        </div>
                    </div>
                </div>

                <!-- Row 2: Alamat -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Alamat Lengkap <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <i class="bi bi-geo-alt absolute left-4 top-3 text-slate-400"></i>
                        <textarea name="alamat" 
                                  id="alamat"
                                  rows="3"
                                  placeholder="Masukkan alamat lengkap kantor"
                                  required
                                  class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all resize-none"></textarea>
                    </div>
                </div>

                <!-- Row 3: Telepon & Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Nomor Telepon <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-telephone absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="tel" 
                                   name="telepon" 
                                   id="telepon"
                                   placeholder="Contoh: 021-12345678"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus: outline-none focus: border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <i class="bi bi-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   placeholder="Contoh: kantor@perusahaan.com"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus: outline-none focus: border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
                        </div>
                    </div>
                </div>

                <!-- Row 4: Jumlah Pegawai & Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Jumlah Pegawai
                        </label>
                        <div class="relative">
                            <i class="bi bi-people absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="number" 
                                   name="jumlah_pegawai" 
                                   id="jumlah_pegawai"
                                   placeholder="Contoh: 50"
                                   min="0"
                                   class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <div class="flex gap-4">
                            <label class="flex-1 flex items-center justify-center gap-3 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[:checked]:border-blue-500 has-[:checked]: bg-blue-50">
                                <input type="radio" name="status" value="Aktif" checked class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                    <span class="text-sm font-medium text-slate-700">Aktif</span>
                                </div>
                            </label>
                            <label class="flex-1 flex items-center justify-center gap-3 px-4 py-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-all has-[: checked]:border-blue-500 has-[:checked]:bg-blue-50">
                                <input type="radio" name="status" value="Nonaktif" class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-slate-400 rounded-full"></span>
                                    <span class="text-sm font-medium text-slate-700">Nonaktif</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex gap-3">
                        <i class="bi bi-info-circle-fill text-blue-500 text-lg flex-shrink-0"></i>
                        <div>
                            <h4 class="text-sm font-medium text-blue-800">Informasi</h4>
                            <p class="text-sm text-blue-600 mt-1">Data kantor akan ditampilkan di daftar kantor setelah disimpan.  Anda dapat mengedit data kapan saja.</p>
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
            <button type="button" onclick="resetFormKantor()" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl text-sm font-medium hover: bg-slate-100 transition-all inline-flex items-center gap-2">
                <i class="bi bi-arrow-counterclockwise"></i>
                Reset
            </button>
            <button type="submit" form="formCreateKantor" class="px-6 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-medium transition-all inline-flex items-center gap-2 shadow-lg shadow-blue-500/30">
                <i class="bi bi-check-lg"></i>
                Simpan Kantor
            </button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        const backdrop = document.getElementById('modalBackdrop');
        const modal = document.getElementById('modalCreate');
        const modalBox = document.getElementById('modalBox');
        
        backdrop. classList.remove('hidden');
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
        const modalBox = document. getElementById('modalBox');
        
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            backdrop.classList.add('hidden');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
        
        document.body.style.overflow = 'auto';
    }
    
    function resetFormKantor() {
        document.getElementById('formCreateKantor').reset();
    }
    
    document.getElementById('modalBackdrop').addEventListener('click', closeModal);
    
    document.getElementById('formCreateKantor').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);
        console.log('Data Kantor:', data);
        alert('Kantor berhasil ditambahkan! ');
        closeModal();
        resetFormKantor();
    });
</script>