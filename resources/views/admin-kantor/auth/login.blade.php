<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AbsensiKu</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *{margin: 0;padding:0;box-sizing: border-box}
        body{font-family:'Plus Jakarta Sans',sans-serif}
        
        @keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
        @keyframes floatSlow{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-6px) rotate(1deg)}}
        @keyframes pulse{0%,100%{opacity:. 3}50%{opacity:. 8}}
        @keyframes glow{0%,100%{box-shadow:0 0 20px rgba(255,255,255,. 2)}50%{box-shadow:0 0 35px rgba(255,255,255,.4)}}
        @keyframes slideUp{from{opacity:0;transform: translateY(20px)}to{opacity:1;transform:translateY(0)}}
        @keyframes progress{from{width: 0}to{width:var(--p)}}
        @keyframes ping{75%,100%{transform:scale(2);opacity:0}}
        @keyframes shimmer{0%{background-position:-200% 0}100%{background-position: 200% 0}}
        
        .float{animation:float 5s ease-in-out infinite}
        .float-slow{animation: floatSlow 6s ease-in-out infinite}
        .pulse-dot{animation:pulse 2.5s ease-in-out infinite}
        .glow{animation:glow 3s ease-in-out infinite}
        .slide-up{animation: slideUp . 6s ease forwards}
        .slide-up-1{animation:slideUp .6s ease . 1s forwards;opacity:0}
        .slide-up-2{animation:slideUp .6s ease .2s forwards;opacity:0}
        .slide-up-3{animation: slideUp .6s ease .3s forwards;opacity:0}
        .slide-up-4{animation:slideUp .6s ease .4s forwards;opacity:0}
        .progress-bar{animation:progress 1. 2s ease forwards}
        
        .live:: before{content:'';position:absolute;inset:0;border-radius:50%;background:inherit;animation:ping 1.5s cubic-bezier(0,0,. 2,1) infinite}
        
        .card{background:#fff;border-radius:24px;box-shadow:0 20px 50px -15px rgba(0,0,0,. 15)}
        .card-sm{background:#fff;border-radius:16px;box-shadow:0 10px 30px -5px rgba(0,0,0,. 12)}
        
        .input-box{border: 2px solid #e5e7eb;transition:all . 25s ease}
        .input-box:focus{border-color:#3b82f6;box-shadow:0 0 0 4px rgba(59,130,246,. 1)}
        .input-box: hover: not(:focus){border-color:#d1d5db}
        
        . btn-main{transition:all .25s ease}
        . btn-main:hover{transform:translateY(-2px);box-shadow:0 12px 30px rgba(59,130,246,.35)}
        
        .social-btn{transition:all . 25s ease}
        .social-btn:hover{transform: translateY(-2px);box-shadow:0 8px 20px rgba(0,0,0,. 08);border-color:#3b82f6}
        
        .dot{width:10px;height:10px;transition:all .3s ease;cursor:pointer}
        .dot. active{width:28px;background:#fff}
        .dot:hover: not(.active){background: rgba(255,255,255,.5)}
        
        . stat-card{transition:all .3s ease}
        .stat-card:hover{transform:translateY(-3px);box-shadow:0 8px 25px rgba(0,0,0,.1)}
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <div class="flex min-h-screen">
        
        <!-- ==================== LEFT SIDE ==================== -->
        <div class="hidden lg:flex lg:w-[55%] bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 relative overflow-hidden">
            
            <!-- Background decorations -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-0 left-0 w-96 h-96 bg-white/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-400/10 rounded-full blur-3xl translate-x-1/4 translate-y-1/4"></div>
                <div class="absolute top-1/2 left-1/2 w-72 h-72 bg-blue-300/5 rounded-full blur-2xl -translate-x-1/2 -translate-y-1/2"></div>
            </div>
            
            <!-- Floating dots -->
            <div class="absolute top-[12%] left-[8%] w-2 h-2 bg-white/40 rounded-full pulse-dot"></div>
            <div class="absolute top-[22%] right-[12%] w-3 h-3 bg-white/25 rounded-full pulse-dot" style="animation-delay:. 5s"></div>
            <div class="absolute top-[50%] left-[5%] w-2 h-2 bg-white/35 rounded-full pulse-dot" style="animation-delay:1s"></div>
            <div class="absolute top-[70%] right-[8%] w-2. 5 h-2.5 bg-white/30 rounded-full pulse-dot" style="animation-delay:1.5s"></div>
            <div class="absolute top-[85%] left-[15%] w-2 h-2 bg-white/25 rounded-full pulse-dot" style="animation-delay:2s"></div>
            
            <!-- X decorations -->
            <div class="absolute top-[15%] left-[12%] text-white/15 text-2xl select-none">✕</div>
            <div class="absolute top-[30%] right-[10%] text-white/10 text-xl select-none">✕</div>
            <div class="absolute bottom-[20%] left-[8%] text-white/15 text-lg select-none">✕</div>
            <div class="absolute bottom-[35%] right-[15%] text-white/10 text-xl select-none">✕</div>
            
            <!-- Content -->
            <div class="flex flex-col w-full p-10 relative z-10">
                
                <!-- Logo -->
                <div class="slide-up flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-xl glow">
                        <i class="bi bi-check-circle-fill text-blue-600 text-2xl"></i>
                    </div>
                    <span class="text-white text-2xl font-bold tracking-tight">AbsensiKu. </span>
                </div>
                
                <!-- CAROUSEL -->
                <div class="flex-1 flex items-center justify-center py-8">
                    <div class="w-full max-w-lg px-6 relative" style="height: 480px">
                        
                        <!-- SLIDE 0 -->
                        <div id="s0" class="absolute inset-0 transition-all duration-700 ease-out" style="opacity:1;transform:translateX(0)">
                            <div class="relative">
                                <div class="card p-8 float">
                                    <!-- Header -->
                                    <div class="flex justify-between items-start mb-6">
                                        <div>
                                            <p class="text-sm text-gray-400 font-medium mb-1">Dashboard Absensi</p>
                                            <h3 class="text-2xl font-bold text-gray-800">Hari Ini</h3>
                                        </div>
                                        <div class="flex items-center gap-2 bg-emerald-50 px-4 py-2 rounded-full">
                                            <span class="relative w-2. 5 h-2.5 bg-emerald-500 rounded-full live"></span>
                                            <span class="text-sm font-semibold text-emerald-600">Live</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Stats Grid -->
                                    <div class="grid grid-cols-3 gap-4 mb-6">
                                        <div class="stat-card bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl p-5 text-center border border-blue-100/50">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg shadow-blue-500/30">
                                                <i class="bi bi-people-fill text-white text-xl"></i>
                                            </div>
                                            <p class="text-3xl font-bold text-gray-800">342</p>
                                            <p class="text-xs text-gray-500 font-medium mt-1">Hadir</p>
                                        </div>
                                        <div class="stat-card bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl p-5 text-center border border-amber-100/50">
                                            <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg shadow-amber-500/30">
                                                <i class="bi bi-clock-fill text-white text-xl"></i>
                                            </div>
                                            <p class="text-3xl font-bold text-gray-800">12</p>
                                            <p class="text-xs text-gray-500 font-medium mt-1">Terlambat</p>
                                        </div>
                                        <div class="stat-card bg-gradient-to-br from-rose-50 to-rose-100/50 rounded-2xl p-5 text-center border border-rose-100/50">
                                            <div class="w-12 h-12 bg-gradient-to-br from-rose-400 to-rose-500 rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg shadow-rose-400/30">
                                                <i class="bi bi-x-circle-fill text-white text-xl"></i>
                                            </div>
                                            <p class="text-3xl font-bold text-gray-800">8</p>
                                            <p class="text-xs text-gray-500 font-medium mt-1">Tidak Hadir</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Progress -->
                                    <div class="bg-gray-50 rounded-2xl p-5">
                                        <div class="flex justify-between items-center mb-3">
                                            <span class="text-sm font-semibold text-gray-700">Tingkat Kehadiran</span>
                                            <span class="text-lg font-bold text-blue-600">94. 5%</span>
                                        </div>
                                        <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full progress-bar" style="--p:94.5%"></div>
                                        </div>
                                        <div class="flex justify-between mt-3 text-xs text-gray-400">
                                            <span>Target:  95%</span>
                                            <span>362 dari 362 pegawai</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Floating notification -->
                                <div class="card-sm px-5 py-4 absolute -top-4 -right-4 flex items-center gap-4 float-slow">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                                        <i class="bi bi-check-lg text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-800">Absen Berhasil</p>
                                        <p class="text-xs text-gray-500">Budi S. • 07:02 WIB</p>
                                    </div>
                                </div>
                                
                                <!-- Time badge -->
                                <div class="card-sm px-4 py-3 absolute -bottom-3 -left-3 flex items-center gap-3 float-slow" style="animation-delay:. 3s">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <i class="bi bi-clock text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold text-gray-800">08:30</p>
                                        <p class="text-[10px] text-gray-400">Waktu Server</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- SLIDE 1 -->
                        <div id="s1" class="absolute inset-0 transition-all duration-700 ease-out" style="opacity:0;transform:translateX(100px)">
                            <div class="relative">
                                <div class="card p-8 float">
                                    <div class="flex justify-between items-start mb-6">
                                        <div>
                                            <p class="text-sm text-gray-400 font-medium mb-1">Aktivitas Terkini</p>
                                            <h3 class="text-2xl font-bold text-gray-800">Real-time</h3>
                                        </div>
                                        <div class="flex -space-x-2">
                                            <div class="w-10 h-10 bg-blue-500 rounded-full border-3 border-white flex items-center justify-center text-white text-sm font-bold shadow-lg">B</div>
                                            <div class="w-10 h-10 bg-purple-500 rounded-full border-3 border-white flex items-center justify-center text-white text-sm font-bold shadow-lg">S</div>
                                            <div class="w-10 h-10 bg-emerald-500 rounded-full border-3 border-white flex items-center justify-center text-white text-sm font-bold shadow-lg">A</div>
                                            <div class="w-10 h-10 bg-gray-200 rounded-full border-3 border-white flex items-center justify-center text-gray-600 text-xs font-bold shadow-lg">+52</div>
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-emerald-50 to-transparent rounded-2xl border border-emerald-100/50">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/30">BS</div>
                                            <div class="flex-1">
                                                <p class="font-semibold text-gray-800">Budi Santoso</p>
                                                <p class="text-sm text-gray-500">Kantor Pusat</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm font-bold text-emerald-600">07:02</p>
                                                <p class="text-xs text-emerald-500">Tepat Waktu</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-amber-50 to-transparent rounded-2xl border border-amber-100/50">
                                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-purple-500/30">SA</div>
                                            <div class="flex-1">
                                                <p class="font-semibold text-gray-800">Siti Aminah</p>
                                                <p class="text-sm text-gray-500">Cabang Jakarta</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm font-bold text-amber-600">07:18</p>
                                                <p class="text-xs text-amber-500">Terlambat</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-blue-50 to-transparent rounded-2xl border border-blue-100/50">
                                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-emerald-500/30">AW</div>
                                            <div class="flex-1">
                                                <p class="font-semibold text-gray-800">Ahmad Wijaya</p>
                                                <p class="text-sm text-gray-500">WFH • Remote</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm font-bold text-blue-600">06:55</p>
                                                <p class="text-xs text-blue-500">Tepat Waktu</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-sm px-5 py-4 absolute -top-4 -right-4 text-center float-slow">
                                    <p class="text-2xl font-bold text-gray-800">55</p>
                                    <p class="text-xs text-gray-500">Baru Masuk</p>
                                </div>
                                
                                <div class="card-sm px-4 py-3 absolute -bottom-3 -left-3 flex items-center gap-3 float-slow" style="animation-delay:.3s">
                                    <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                                        <i class="bi bi-sun-fill text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-800">Shift Pagi</p>
                                        <p class="text-[10px] text-gray-400">07:00 - 15:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- SLIDE 2 -->
                        <div id="s2" class="absolute inset-0 transition-all duration-700 ease-out" style="opacity:0;transform:translateX(100px)">
                            <div class="relative">
                                <div class="card p-8 float">
                                    <div class="flex justify-between items-start mb-6">
                                        <div>
                                            <p class="text-sm text-gray-400 font-medium mb-1">Statistik Cabang</p>
                                            <h3 class="text-2xl font-bold text-gray-800">Per Lokasi</h3>
                                        </div>
                                        <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-4 py-2 rounded-full">Hari Ini</span>
                                    </div>
                                    
                                    <div class="space-y-4">
                                        <div class="bg-gradient-to-r from-blue-50 to-transparent rounded-2xl p-5 border border-blue-100/50">
                                            <div class="flex items-center justify-between mb-3">
                                                <div class="flex items-center gap-4">
                                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                                                        <i class="bi bi-building text-white text-lg"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-800">Kantor Pusat</p>
                                                        <p class="text-sm text-gray-500">150 Pegawai</p>
                                                    </div>
                                                </div>
                                                <span class="text-2xl font-bold text-blue-600">98%</span>
                                            </div>
                                            <div class="h-2 bg-blue-100 rounded-full"><div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full progress-bar" style="--p:98%"></div></div>
                                        </div>
                                        
                                        <div class="bg-gradient-to-r from-purple-50 to-transparent rounded-2xl p-5 border border-purple-100/50">
                                            <div class="flex items-center justify-between mb-3">
                                                <div class="flex items-center gap-4">
                                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                                                        <i class="bi bi-geo-alt text-white text-lg"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-800">Cabang Jakarta</p>
                                                        <p class="text-sm text-gray-500">120 Pegawai</p>
                                                    </div>
                                                </div>
                                                <span class="text-2xl font-bold text-purple-600">92%</span>
                                            </div>
                                            <div class="h-2 bg-purple-100 rounded-full"><div class="h-full bg-gradient-to-r from-purple-500 to-purple-600 rounded-full progress-bar" style="--p: 92%"></div></div>
                                        </div>
                                        
                                        <div class="bg-gradient-to-r from-emerald-50 to-transparent rounded-2xl p-5 border border-emerald-100/50">
                                            <div class="flex items-center justify-between mb-3">
                                                <div class="flex items-center gap-4">
                                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                                                        <i class="bi bi-pin-map text-white text-lg"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-800">Cabang Surabaya</p>
                                                        <p class="text-sm text-gray-500">80 Pegawai</p>
                                                    </div>
                                                </div>
                                                <span class="text-2xl font-bold text-emerald-600">95%</span>
                                            </div>
                                            <div class="h-2 bg-emerald-100 rounded-full"><div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full progress-bar" style="--p:95%"></div></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-sm px-5 py-4 absolute -top-4 -right-4 flex items-center gap-3 float-slow">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <i class="bi bi-people-fill text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-xl font-bold text-gray-800">350</p>
                                        <p class="text-xs text-gray-500">Total</p>
                                    </div>
                                </div>
                                
                                <div class="card-sm px-4 py-3 absolute -bottom-3 -left-3 flex items-center gap-2 float-slow" style="animation-delay:.3s">
                                    <span class="relative w-3 h-3 bg-emerald-500 rounded-full live"></span>
                                    <p class="text-sm font-bold text-gray-800">328 <span class="font-normal text-gray-500">Online</span></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Bottom text -->
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-white mb-2" id="tt">Cepat, Mudah & Akurat</h2>
                    <p class="text-blue-100 text-base max-w-md mx-auto leading-relaxed" id="dd">Kelola absensi pegawai dengan sistem modern.  Pantau kehadiran real-time dari mana saja. </p>
                    
                    <div class="flex items-center justify-center gap-3 mt-6">
                        <button class="dot bg-white rounded-full active" onclick="go(0)"></button>
                        <button class="dot bg-white/30 rounded-full" onclick="go(1)"></button>
                        <button class="dot bg-white/30 rounded-full" onclick="go(2)"></button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ==================== RIGHT SIDE ==================== -->
        <div class="w-full lg:w-[45%] flex flex-col bg-white">
            <div class="flex-1 flex items-center justify-center p-8 lg:p-12 xl:p-16">
                <div class="w-full max-w-md">
                    
                    <!-- Mobile logo -->
                    <div class="lg:hidden flex items-center justify-center gap-3 mb-8 slide-up">
                        <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="bi bi-check-circle-fill text-white text-2xl"></i>
                        </div>
                        <span class="text-gray-800 text-2xl font-bold">AbsensiKu. </span>
                    </div>
                    
                    <!-- Title -->
                    <div class="text-center mb-8 slide-up">
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang!  👋</h1>
                        <p class="text-gray-500">Masuk untuk mengelola absensi pegawai</p>
                    </div>
                    
                    <!-- Social buttons -->
                    <div class="flex gap-4 mb-6 slide-up-1">
                        <button class="social-btn flex-1 flex items-center justify-center gap-3 py-3.5 border-2 border-gray-200 rounded-2xl bg-white">
                            <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="#4285F4" d="M22. 56 12.25c0-.78-. 07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-. 98 7.28-2.66l-3.57-2.77c-.98. 66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22. 81-. 62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                            <span class="text-sm font-semibold text-gray-700">Google</span>
                        </button>
                        <button class="social-btn flex-1 flex items-center justify-center gap-3 py-3.5 border-2 border-gray-200 rounded-2xl bg-white">
                            <i class="bi bi-apple text-xl text-gray-800"></i>
                            <span class="text-sm font-semibold text-gray-700">Apple</span>
                        </button>
                    </div>
                    
                    <!-- Divider -->
                    <div class="relative mb-6 slide-up-2">
                        <div class="absolute inset-0 flex items-center"><div class="w-full border-t-2 border-gray-100"></div></div>
                        <div class="relative flex justify-center"><span class="px-4 bg-white text-sm text-gray-400">atau masuk dengan email</span></div>
                    </div>
                    
                    <!-- Form -->
                    <form action="/kantor/dashboard" method="GET" class="space-y-5">
                        <div class="slide-up-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <div class="relative">
                                <i class="bi bi-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="email" name="email" placeholder="nama@perusahaan.com" class="input-box w-full pl-12 pr-4 py-4 rounded-2xl text-base focus:outline-none">
                            </div>
                        </div>
                        
                        <div class="slide-up-3">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <i class="bi bi-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="password" name="password" id="pwd" placeholder="••••••••" class="input-box w-full pl-12 pr-12 py-4 rounded-2xl text-base focus:outline-none">
                                <button type="button" onclick="tog()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                    <i class="bi bi-eye text-lg" id="eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between slide-up-3">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-5 h-5 rounded-lg border-2 border-gray-300 text-blue-600 focus:ring-blue-500 focus:ring-offset-0">
                                <span class="text-sm text-gray-600 group-hover:text-gray-800 transition-colors">Ingat saya</span>
                            </label>
                            <a href="#" class="text-sm text-blue-600 font-semibold hover:text-blue-700 transition-colors">Lupa password? </a>
                        </div>
                        
                        <div class="slide-up-4">
                            <button type="submit" class="btn-main w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold py-4 rounded-2xl text-lg shadow-lg shadow-blue-500/25">
                                Masuk
                            </button>
                        </div>
                        
                        <p class="text-center text-gray-500 slide-up-4">
                            Belum punya akun?  <a href="/register" class="font-bold text-gray-800 hover:text-blue-600 transition-colors">Daftar sekarang</a>
                        </p>
                    </form>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="flex items-center justify-between px-8 py-5 border-t border-gray-100">
                <a href="#" class="text-sm text-gray-400 hover:text-blue-600 transition-colors">Privacy Policy</a>
                <span class="text-sm text-gray-400">© 2026 AbsensiKu</span>
            </div>
        </div>
    </div>
    
    <script>
        function tog(){
            const p=document.getElementById('pwd'),e=document.getElementById('eye');
            p.type=p.type==='password'?'text':'password';
            e.classList.toggle('bi-eye');e.classList.toggle('bi-eye-slash');
        }
        
        const slides=[document.getElementById('s0'),document.getElementById('s1'),document.getElementById('s2')];
        const dots=document.querySelectorAll('.dot');
        const tt=document.getElementById('tt'),dd=document.getElementById('dd');
        const data=[
            {t:'Cepat, Mudah & Akurat',d:'Kelola absensi pegawai dengan sistem modern. Pantau kehadiran real-time dari mana saja.'},
            {t:'Pantau Aktivitas Live',d:'Lihat siapa yang sudah absen, terlambat, atau izin secara real-time dengan notifikasi instan.'},
            {t:'Laporan Per Cabang',d:'Analisis kehadiran per divisi dan cabang. Buat keputusan berdasarkan data yang akurat.'}
        ];
        let cur=0,timer;
        
        function go(i){
            slides[cur]. style.opacity='0';
            slides[cur]. style.transform='translateX(-100px)';
            
            setTimeout(()=>{
                slides. forEach((s,idx)=>{
                    if(idx===i){s.style.opacity='1';s.style.transform='translateX(0)';}
                    else if(idx>i){s.style.transform='translateX(100px)';}
                    else{s.style.transform='translateX(-100px)';}
                });
            },150);
            
            dots. forEach((d,idx)=>{d.classList.toggle('active',idx===i);d.style.background=idx===i? '#fff':'rgba(255,255,255,. 3)';});
            
            tt.style.opacity='0';dd.style.opacity='0';
            tt.style.transform='translateY(10px)';dd.style.transform='translateY(10px)';
            setTimeout(()=>{
                tt.textContent=data[i].t;dd. textContent=data[i].d;
                tt.style.opacity='1';dd. style.opacity='1';
                tt. style.transform='translateY(0)';dd.style.transform='translateY(0)';
            },200);
            
            cur=i;
            clearInterval(timer);
            timer=setInterval(()=>go((cur+1)%3),5000);
        }
        
        tt.style.transition='all . 3s ease';
        dd.style.transition='all .3s ease';
        timer=setInterval(()=>go((cur+1)%3),5000);
    </script>
</body>
</html>