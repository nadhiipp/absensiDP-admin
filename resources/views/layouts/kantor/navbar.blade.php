<header class="fixed top-0 left-60 right-0 h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 z-40">
    <!-- Search -->
    <div class="relative w-72">
        <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
        <input type="text" 
               placeholder="Cari pegawai..." 
               class="w-full pl-11 pr-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all">
    </div>

    <!-- Right Section -->
    <div class="flex items-center gap-5">
        <!-- Notification -->
        <button class="relative w-10 h-10 flex items-center justify-center rounded-lg text-slate-500 hover: bg-slate-100 transition-all">
            <i class="bi bi-bell text-xl"></i>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <!-- User -->
        <div class="flex items-center gap-3 cursor-pointer">
            <div class="text-right">
                <div class="text-sm font-semibold text-slate-800">Admin kantor</div>
                <div class="text-xs text-slate-400">Administrator</div>
            </div>
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                AK
            </div>
        </div>
    </div>
</header>