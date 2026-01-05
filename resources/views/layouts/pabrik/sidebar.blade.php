<aside class="fixed top-0 left-0 w-60 h-screen bg-white border-r border-slate-200 z-50 flex flex-col">
    <!-- Brand -->
    <div class="flex items-center gap-3 px-5 py-5 border-b border-slate-200">
        <div class="w-9 h-9 bg-emerald-500 rounded-lg flex items-center justify-center text-white">
            <i class="bi bi-check-circle-fill text-lg"></i>
        </div>
        <span class="font-semibold text-slate-800">Absensi Pabrik</span>
    </div>

    <!-- Menu -->
    <nav class="flex-1 p-3 overflow-y-auto">
        <a href="{{ route('admin-pabrik.dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-pabrik.dashboard') 
                     ? 'bg-emerald-50 text-emerald-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-grid-1x2-fill text-lg"></i>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('admin-pabrik.data-pegawai') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-pabrik.data-pegawai') 
                     ?  'bg-emerald-50 text-emerald-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-people text-lg"></i>
            <span>Data Pegawai</span>
        </a>

        <a href="{{ route('admin-pabrik.data-pabrik') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-pabrik.data-pabrik') 
                     ?  'bg-emerald-50 text-emerald-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-building text-lg"></i>
            <span>Data Pabrik</span>
        </a>

        <a href="{{ route('admin-pabrik.absensi') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-pabrik.absensi') 
                     ? 'bg-emerald-50 text-emerald-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover: text-slate-700' }}">
            <i class="bi bi-clock text-lg"></i>
            <span>Absensi Hari Ini</span>
        </a>
        
        
        <a href="{{ route('admin-pabrik.rekap-absensi') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-pabrik.rekap-absensi') 
                     ? 'bg-emerald-50 text-emerald-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-file-earmark-text text-lg"></i>
            <span>Rekap Absensi</span>
        </a>

        <a href="{{ route('admin-pabrik.laporan') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-pabrik.laporan') 
                     ? 'bg-emerald-50 text-emerald-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-file-text text-lg"></i>
            <span>Laporan</span>
        </a>
        
      
        
        <a href="{{ route('admin-pabrik.shift-kerja') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-pabrik.shift-kerja') 
                     ? 'bg-emerald-50 text-emerald-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-clock-history text-lg"></i>
            <span>Shift Kerja</span>
        </a>
        
        <a href="{{ route('admin-pabrik.pengaturan') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-pabrik.pengaturan') 
                     ? 'bg-emerald-50 text-emerald-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-gear text-lg"></i>
            <span>Pengaturan</span>
        </a>
    </nav>

    <!-- Footer -->
    <div class="p-3 border-t border-slate-200">
        <a href="#" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-700 transition-all duration-200 no-underline">
            <i class="bi bi-box-arrow-left text-lg"></i>
            <span>Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</aside>