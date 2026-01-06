<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Absensi Sekolah</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #4C6FFF;
            --primary-blue-dark: #3451E8;
            --success-green: #10B981;
            --warning-yellow: #F59E0B;
            --danger-red: #EF4444;
            --info-blue: #3B82F6;
            --bg-main: #F8F9FD;
            --bg-white: #FFFFFF;
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --text-light: #9CA3AF;
            --border-color: #E5E7EB;
            --sidebar-width: 260px;
            --navbar-height: 70px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--bg-white);
            border-right: 1px solid var(--border-color);
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 10px;
        }

        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            font-weight: 700;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .sidebar-menu {
            padding: 20px 12px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            margin-bottom: 4px;
            border-radius: 10px;
            color: var(--text-gray);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .menu-item:hover {
            background: #F3F4F6;
            color: var(--primary-blue);
        }

        .menu-item.active {
            background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            color: var(--primary-blue);
            font-weight: 600;
        }

        .menu-item i {
            width: 20px;
            margin-right: 12px;
            font-size: 16px;
        }

        .menu-divider {
            height: 1px;
            background: var(--border-color);
            margin: 16px 12px;
        }

        /* Main Content */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Navbar */
        .navbar {
            height: var(--navbar-height);
            background: var(--bg-white);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .navbar-button {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: var(--bg-white);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--text-gray);
            position: relative;
        }

        .navbar-button:hover {
            background: var(--bg-main);
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .navbar-button .badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 18px;
            height: 18px;
            background: var(--danger-red);
            border-radius: 50%;
            font-size: 10px;
            font-weight: 600;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-left: 8px;
        }

        .user-profile:hover {
            background: var(--bg-main);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .user-role {
            font-size: 12px;
            color: var(--text-gray);
        }

        /* Content */
        .content {
            padding: 32px;
        }

        .page-header {
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .page-subtitle {
            font-size: 14px;
            color: var(--text-gray);
        }

        /* Common Buttons */
        .btn-primary {
            padding: 12px 24px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(76, 111, 255, 0.3);
        }

        .btn-secondary {
            padding: 12px 24px;
            background: white;
            color: var(--text-dark);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-secondary:hover {
            background: var(--bg-main);
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .btn-add {
            padding: 12px 24px;
            background: linear-gradient(135deg, var(--success-green), #059669);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
        }

        /* Pagination */
        .pagination {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid var(--border-color);
        }

        .pagination-info {
            font-size: 13px;
            color: var(--text-gray);
        }

        .pagination-buttons {
            display: flex;
            gap: 8px;
        }

        .pagination-btn {
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: white;
            color: var(--text-gray);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            min-width: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination-btn:hover:not(:disabled) {
            background: var(--bg-main);
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .pagination-btn.active {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .content {
                padding: 20px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="sidebar-title">Absensi Sekolah</div>
        </div>

        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}"
                class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                Dashboard
            </a>

            <a href="{{ route('admin.absensi.today') }}"
                class="menu-item {{ request()->routeIs('admin.absensi.today') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i>
                Absensi Hari Ini
            </a>

            <a href="{{ route('admin.riwayat.absensi') }}"
                class="menu-item {{ request()->routeIs('admin.riwayat.absensi') ? 'active' : '' }}">
                <i class="fas fa-history"></i>
                Riwayat Absensi
            </a>

            <div class="menu-divider"></div>

            <a href="{{ route('admin.data.siswa') }}"
                class="menu-item {{ request()->routeIs('admin.data.siswa') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                Data Siswa
            </a>

            <a href="{{ route('admin.data.kelas') }}"
                class="menu-item {{ request()->routeIs('admin.data.kelas') ? 'active' : '' }}">
                <i class="fas fa-door-open"></i>
                Data Kelas
            </a>

            <div class="menu-divider"></div>

            <a href="{{ route('admin.laporan.absensi') }}"
                class="menu-item {{ request()->routeIs('admin.laporan.absensi') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Laporan Absensi
            </a>


            <div class="menu-divider"></div>

            <a href="#" class="menu-item"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Keluar
            </a>
            <form id="logout-form" action="#" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-wrapper">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="navbar-actions">
                <div class="navbar-button">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </div>

                <div class="user-profile">
                    <div class="user-avatar">AS</div>
                    <div class="user-info">
                        <div class="user-name">Admin Sekolah</div>
                        <div class="user-role">Administrator</div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="content">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>

</html>
