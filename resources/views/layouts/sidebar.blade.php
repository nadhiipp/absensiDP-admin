<aside class="fixed top-0 left-0 w-60 h-screen bg-white border-r border-slate-200 z-50 flex flex-col">
    <!-- Brand -->
    <div class="flex items-center gap-3 px-5 py-5 border-b border-slate-200">
        <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center text-white">
            <i class="bi bi-building text-lg"></i>
        </div>
        <span class="font-semibold text-slate-800">Admin Kantor</span>
    </div>

    <!-- Menu -->
    <nav class="flex-1 p-3 overflow-y-auto">
        <a href="{{ route('admin-kantor.dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-kantor.dashboard') 
                     ? 'bg-blue-50 text-blue-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-grid-1x2-fill text-lg"></i>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('admin-kantor.data-kantor') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-kantor.data-kantor') 
                     ? 'bg-blue-50 text-blue-600' 
                     :  'text-slate-500 hover: bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-building text-lg"></i>
            <span>Data Kantor</span>
        </a>
        
        <a href="{{ route('admin-kantor.pegawai') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-kantor.pegawai') 
                     ?  'bg-blue-50 text-blue-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-people text-lg"></i>
            <span>Pegawai</span>
        </a>
        
        <a href="{{ route('admin-kantor.laporan') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-kantor.laporan') 
                     ?  'bg-blue-50 text-blue-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-file-earmark-text text-lg"></i>
            <span>Laporan</span>
        </a>
        
        <a href="{{ route('admin-kantor.pengaturan') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-all duration-200 no-underline
                  {{ request()->routeIs('admin-kantor.pengaturan') 
                     ? 'bg-blue-50 text-blue-600' 
                     : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="bi bi-gear text-lg"></i>
            <span>Pengaturan</span>
        </a>
    </nav>

    <!-- Footer -->
    <div class="p-3 border-t border-slate-200">
        <a href="#" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-red-500 hover:bg-red-50 transition-all duration-200 no-underline">
            <i class="bi bi-box-arrow-left text-lg"></i>
            <span>Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</aside>