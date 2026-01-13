<! DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Admin Kantor</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .bg-pattern {
            background-color: #1e1b4b;
            position: relative;
            overflow: hidden;
        }
        
        .shape-circle-yellow {
            position: absolute;
            width:  280px;
            height: 280px;
            background: #fbbf24;
            border-radius: 50%;
            bottom:  5%;
            left: 35%;
        }
        
        .shape-circle-yellow-small {
            position: absolute;
            width: 180px;
            height: 180px;
            background:  #fcd34d;
            border-radius: 50%;
            bottom: 8%;
            left: 48%;
            opacity: 0.8;
        }
        
        .shape-circle-pink {
            position: absolute;
            width: 320px;
            height:  320px;
            background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%);
            border-radius: 50%;
            bottom: -10%;
            right:  5%;
        }
        
        .shape-circle-coral {
            position: absolute;
            width: 200px;
            height:  200px;
            background: #fb7185;
            border-radius: 50%;
            top: 15%;
            right: 10%;
        }
        
        .shape-triangle-blue {
            position: absolute;
            width: 0;
            height:  0;
            border-left: 120px solid transparent;
            border-right: 120px solid transparent;
            border-bottom: 200px solid #3b82f6;
            bottom: 10%;
            left: 5%;
            transform: rotate(-15deg);
        }
        
        .shape-triangle-blue-small {
            position: absolute;
            width: 0;
            height: 0;
            border-left:  80px solid transparent;
            border-right: 80px solid transparent;
            border-bottom: 140px solid #2563eb;
            bottom: 25%;
            left:  2%;
            transform:  rotate(10deg);
        }
        
        .shape-half-circle-coral {
            position:  absolute;
            width: 400px;
            height: 200px;
            background: #f87171;
            border-radius: 0 0 200px 200px;
            top: -50px;
            right:  25%;
            transform: rotate(180deg);
        }
        
        . shape-info-box {
            position:  absolute;
            top: 30px;
            right: 30px;
            background: #3b5998;
            padding: 20px 25px;
            border-radius: 0 16px 16px 16px;
            color: white;
            z-index: 10;
        }
        
        . input-field {
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
        }
        
        . btn-register {
            transition:  all 0.3s ease;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        }
    </style>
</head>
<body class="min-h-screen bg-pattern">
    
    <!-- Decorative Shapes -->
    <div class="shape-triangle-blue"></div>
    <div class="shape-triangle-blue-small"></div>
    <div class="shape-circle-yellow"></div>
    <div class="shape-circle-yellow-small"></div>
    <div class="shape-circle-pink"></div>
    <div class="shape-circle-coral"></div>
    <div class="shape-half-circle-coral"></div>
    
    <!-- Info Box Top Right -->
    <div class="shape-info-box hidden lg:block">
        <p class="text-sm font-medium mb-1">Bergabunglah bersama kami</p>
        <p class="text-sm font-medium italic mb-3">untuk pengalaman terbaik. </p>
        <div class="flex items-center gap-2 text-sm mb-1">
            <i class="bi bi-envelope-fill"></i>
            <span>info@kantor. id</span>
        </div>
        <div class="flex items-center gap-2 text-sm">
            <i class="bi bi-telephone-fill"></i>
            <span>085-12345678</span>
        </div>
    </div>
    
    <!-- Register Form Section -->
    <div class="min-h-screen flex items-center py-10">
        <div class="w-full max-w-md lg:max-w-lg xl:max-w-xl bg-white rounded-none lg:rounded-3xl shadow-2xl p-8 lg:p-12 lg:ml-16 xl:ml-24 relative z-20">
            
            <!-- Logo -->
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="bi bi-building text-white text-lg"></i>
                </div>
                <span class="text-xl font-bold text-slate-800">kantor</span>
            </div>
            
            <!-- Welcome Text -->
            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-bold text-slate-800 leading-tight">
                    Buat Akun<br>
                    <span class="text-blue-600">Baru</span>
                </h1>
                <p class="text-slate-500 mt-2">Lengkapi data diri Anda untuk mendaftar</p>
            </div>
            
            <!-- Register Form -->
            <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <i class="bi bi-person absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" 
                               name="name" 
                               placeholder="Masukkan nama lengkap"
                               required
                               value="{{ old('name') }}"
                               class="input-field w-full pl-12 pr-5 py-4 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Email
                    </label>
                    <div class="relative">
                        <i class="bi bi-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="email" 
                               name="email" 
                               placeholder="Masukkan email"
                               required
                               value="{{ old('email') }}"
                               class="input-field w-full pl-12 pr-5 py-4 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus: ring-blue-100">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <i class="bi bi-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="password" 
                               name="password" 
                               id="password"
                               placeholder="Buat password"
                               required
                               class="input-field w-full pl-12 pr-12 py-4 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        <button type="button" onclick="togglePassword('password', 'eyeIcon1')" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <i class="bi bi-eye" id="eyeIcon1"></i>
                        </button>
                    </div>
                    <p class="text-xs text-slate-400 mt-1">Minimal 8 karakter</p>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Konfirmasi Password
                    </label>
                    <div class="relative">
                        <i class="bi bi-lock-fill absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="password" 
                               name="password_confirmation" 
                               id="password_confirmation"
                               placeholder="Ulangi password"
                               required
                               class="input-field w-full pl-12 pr-12 py-4 border border-slate-200 rounded-xl text-sm bg-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        <button type="button" onclick="togglePassword('password_confirmation', 'eyeIcon2')" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <i class="bi bi-eye" id="eyeIcon2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Terms -->
                <div class="flex items-start gap-3">
                    <input type="checkbox" name="terms" required class="w-4 h-4 mt-1 text-blue-600 rounded focus:ring-blue-500">
                    <label class="text-sm text-slate-600">
                        Saya menyetujui <a href="#" class="text-blue-600 hover:underline">Syarat & Ketentuan</a> serta <a href="#" class="text-blue-600 hover:underline">Kebijakan Privasi</a>
                    </label>
                </div>
                
                <!-- Register Button -->
                <button type="submit" class="btn-register w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-xl transition-all">
                    Daftar Sekarang
                </button>
                
                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-slate-400">atau</span>
                    </div>
                </div>
                
                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-sm text-slate-600">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function togglePassword(inputId, iconId) {
            const password = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
            
            if (password. type === 'password') {
                password.type = 'text';
                eyeIcon.classList. remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                password.type = 'password';
                eyeIcon.classList. remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>
</html>