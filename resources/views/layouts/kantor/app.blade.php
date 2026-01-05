<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Absensi Kantor')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2? family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    
    @stack('styles')
</head>
<body class="bg-slate-50 min-h-screen antialiased">
    
    @include('layouts.kantor.sidebar')
    @include('layouts.kantor.navbar')

    <main class="ml-60 mt-16 p-8 min-h-[calc(100vh-64px)]">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>