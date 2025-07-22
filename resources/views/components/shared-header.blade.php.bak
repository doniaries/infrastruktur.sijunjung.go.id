<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('images/kabupaten-sijunjung.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700|instrument-sans:400,500,600" rel="stylesheet" />

<!-- CSS Plugins -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
{{-- <link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/fontawesome.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/brands.css') }}">
<link rel="stylesheet" href="{{ asset('/front/plugins/font-awesome/solid.css') }}">
<link rel="stylesheet" href="{{ asset('/front/css/style.css') }}">

<!-- Styles -->
<style>
    /* Typewriter cursor animation */
    .caret {
        display: inline-block;
        width: 2px;
        background-color: currentColor;
        margin-left: 2px;
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {

        from,
        to {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

    /* Typewriter container */
    .type-hero {
        min-height: 1.5em;
        display: inline-block;
        text-align: center;
    }

    /* Base styles */
    body {
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s ease, color 0.3s ease;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        position: relative;
        padding-top: 150px;
        /* Add padding to prevent content from being hidden behind fixed header */
    }

    /* Dark mode styles */
    body.dark {
        background-color: #0f172a;
        color: #8b8b8b;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 1.5rem 0;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
        color: #1a202c;
    }

    th {
        background-color: #f7fafc;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }

    tr:last-child td {
        border-bottom: none;
    }

    /* Dark mode table styles */
    body.dark table {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    }

    body.dark td {
        color: #e2e8f0 !important;
        /* Light gray text for better visibility */
        border-color: #2d3748;
    }

    body.dark th {
        background-color: #2d3748;
        color: #f7fafc !important;
    }

    body.dark tr {
        background-color: #1e293b;
        /* Slightly lighter than body for better contrast */
    }

    body.dark tr:nth-child(even) {
        background-color: #1a2438;
    }

    /* Ensure section content is visible in dark mode */
    body.dark section {
        background-color: #0f172a;
        color: #e2e8f0;
    }

    /* Ensure card content is visible in dark mode */
    body.dark .bg-white {
        background-color: #1e293b !important;
        color: #e2e8f0 !important;
    }

    /* Ensure text in cards is visible */
    body.dark .text-gray-800 {
        color: #e2e8f0 !important;
    }

    /* Button styles for both light and dark modes */
    .btn-primary {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        border-radius: 0.375rem;
        font-weight: 600;
        text-align: center;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        cursor: pointer;
        border: none;
    }

    /* Light mode button */
    .btn-primary {
        background-color: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    /* Dark mode button */
    body.dark .btn-primary {
        background-color: #3b82f6;
        color: white;
    }

    body.dark .btn-primary:hover {
        background-color: #2563eb;
    }

    /* Specific styling for the 'Tambah Laporan' button */
    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        border-radius: 0.375rem;
        font-weight: 600;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    /* Light mode for Tambah Laporan button */
    .btn-tambah {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        box-shadow: 0 2px 4px rgba(37, 99, 235, 0.3);
    }

    .btn-tambah:hover {
        background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(37, 99, 235, 0.4);
    }

    .btn-tambah:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(37, 99, 235, 0.3);
    }

    /* Dark mode for Tambah Laporan button */
    body.dark .btn-tambah {
        background-color: #3b82f6;
        color: white;
    }

    body.dark .btn-tambah:hover {
        background-color: #2563eb;
    }

    /* Icon button styles */
    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: #f1f5f9;
        color: #1e40af;
        transition: all 0.2s ease;
    }

    .btn-icon:hover {
        background-color: #e2e8f0;
        transform: translateY(-1px);
    }

    body.dark .btn-icon {
        background-color: #1e293b;
        color: #93c5fd;
    }

    body.dark .btn-icon:hover {
        background-color: #334155;
    }

    /* Responsive button sizes */
    @media (min-width: 992px) {
        .register-button {
            padding: 0.4rem 1rem !important;
            font-size: 0.9rem !important;
        }

        .register-button svg {
            width: 14px !important;
            height: 14px !important;
            margin-right: 0.4rem !important;
        }
    }

    /* Sky background */
    .animated-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
        background-color: #eef2f5;
        /* Light blue sky for light mode */
        transition: background-color 0.3s ease;
    }

    body.dark .animated-bg {
        background-color: #0c1222;
        /* Dark blue night sky for dark mode */
    }

    /* Stars (visible only in dark mode) */
    .stars {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    body.dark .stars {
        opacity: 1;
    }

    .star {
        position: absolute;
        background-color: #ffffff;
        border-radius: 50%;
        animation: twinkle 2s infinite alternate;
    }

    @keyframes twinkle {
        0% {
            opacity: 0.2;
        }

        100% {
            opacity: 1;
        }
    }



    /* Header styles */
    .header {
        background-color: #ffffff;
        padding: 1rem 2rem;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header nav a {
        color: #1e40af;
        font-weight: 500;
        transition: all 0.2s ease;
        padding: 0.5rem 0;
        position: relative;
    }

    .header nav a:hover {
        color: #1e3a8a;
    }

    .header nav a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #1e40af;
        transition: width 0.3s ease;
    }

    .header nav a:hover::after {
        width: 100%;
    }

    body.dark .header nav a {
        color: #fff !important;
    }

    body.dark .header nav a:hover,
    body.dark .header nav a.active {
        color: #60a5fa !important;
    }

    body.dark .header nav a::after {
        background-color: #60a5fa;
    }

    .header.scrolled {
        background-color: rgba(255, 255, 255, 0.95);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    body.dark .header {
        background-color: #0f172a;
    }

    body.dark .header.scrolled {
        background-color: rgba(15, 23, 42, 0.98);
    }

    /* Mobile menu styles */
    .mobile-menu-toggle {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 21px;
        cursor: pointer;
        z-index: 200;
    }

    .mobile-menu-toggle span {
        display: block;
        height: 3px;
        width: 100%;
        background-color: #2563eb;
        border-radius: 3px;
        transition: all 0.3s ease;
    }

    body.dark .mobile-menu-toggle span {
        background-color: #60a5fa;
    }

    .mobile-menu-toggle.active span:nth-child(1) {
        transform: translateY(9px) rotate(45deg);
    }

    .mobile-menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }

    .mobile-menu-toggle.active span:nth-child(3) {
        transform: translateY(-9px) rotate(-45deg);
    }

    /* Mega menu styles */
    .mega-menu {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 0;
        background-color: rgba(255, 255, 255, 0.95);
        overflow: hidden;
        transition: height 0.3s ease;
        z-index: 150;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    body.dark .mega-menu {
        background-color: rgba(15, 23, 42, 0.95);
    }

    .mega-menu.active {
        height: 100vh;
        padding: 80px 20px 20px;
        overflow-y: auto;
    }

    .mega-menu-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        max-width: 1200px;
    }

    .mega-menu-section {
        margin-bottom: 20px;
        width: 100%;
        text-align: center;
    }

    .mega-menu-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2563eb;
        margin-bottom: 10px;
    }

    body.dark .mega-menu-title {
        color: #60a5fa;
    }

    .mega-menu-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .mega-menu-link {
        padding: 8px 15px;
        background-color: #f1f5f9;
        border-radius: 5px;
        color: #1e40af;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    body.dark .mega-menu-link {
        background-color: #1e293b;
        color: #93c5fd;
    }

    .mega-menu-link:hover {
        background-color: #e2e8f0;
        transform: translateY(-2px);
    }

    body.dark .mega-menu-link:hover {
        background-color: #334155;
    }

    /* Prevent scrolling when menu is open */
    body.menu-open {
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .mobile-menu-toggle {
            display: flex;
        }

        .header {
            padding: 1rem;
            background-color: rgba(255, 255, 255, 0.9);
        }

        body.dark .header {
            background-color: rgba(15, 23, 42, 0.9);
        }

        .logo {
            height: 40px;
        }

        .app-title {
            font-size: 1.2rem;
        }

        .app-subtitle {
            font-size: 0.75rem;
        }

        .main-content {
            padding-top: 5rem;
        }
    }

    .logo-container {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logo {
        height: 50px;
        width: auto;
        transition: transform 0.3s ease;
    }

    .logo:hover {
        transform: scale(1.05);
    }

    .app-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #12130f;
        margin: 0;
    }

    body.dark .app-title {
        color: #60a5fa;
    }

    .app-subtitle {
        font-size: 0.875rem;
        color: #64748b;
        margin: 0;
    }

    body.dark .app-subtitle {
        color: #94a3b8;
    }

    /* Theme toggle */
    .theme-toggle {
        cursor: pointer;
        width: 48px;
        height: 24px;
        border-radius: 12px;
        background-color: #e2e8f0;
        position: relative;
        transition: all 0.3s ease;
    }

    .theme-toggle.dark {
        background-color: #1f2937;
    }

    .theme-toggle::after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: white;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .theme-toggle.dark::after {
        transform: translateX(24px);
        background-color: #f59e0b;
    }

    /* Main content */
    .main-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 5rem 2rem 2rem;
    }

    /* Hero section */
    .hero {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 3rem 1rem;
        margin-bottom: 3rem;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #181b15;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    body.dark .hero-title {
        color: #a5fa60;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: #64748b;
        max-width: 800px;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .hero-buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.8rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        hero-buttons a {
            padding: 0.5rem 1rem !important;
            font-size: 0.8rem !important;
            border-radius: 0.375rem !important;
            width: 100%;
            max-width: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-buttons a svg {
            width: 1rem;
            height: 1rem;
            margin-right: 0.5rem;
        }

        .register-button,
        .login-button {
            margin-right: 0;
            margin-bottom: 1rem;
            width: 100%;
            text-align: center;
        }

        .desktop-nav {
            display: none;
        }
    }

    body.dark .hero-subtitle {
        color: #94a3b8;
    }

    /* Login button with animation */
    .login-button {
        display: inline-block;
        background-color: #2563eb;
        color: white;
        font-weight: 600;
        padding: 0.75rem 2rem;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        text-align: center;
    }

    .login-button:before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0%;
        background-color: #1d4ed8;
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        z-index: -1;
    }

    .login-button:hover:before {
        height: 100%;
    }

    .login-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
    }

    body.dark .login-button {
        background-color: #3b82f6;
        box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
    }

    body.dark .login-button:before {
        background-color: #2563eb;
    }

    /* Register button */
    .register-button {
        display: inline-block;
        background-color: #10b981;
        color: white;
        font-weight: 600;
        padding: 0.75rem 2rem;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
        margin-right: 1rem;
        text-align: center;
    }

    .register-button:before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0%;
        background-color: #059669;
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        z-index: -1;
    }

    .register-button:hover:before {
        height: 100%;
    }

    .register-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    body.dark .register-button {
        background-color: #10b981;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3);
    }

    body.dark .register-button:before {
        background-color: #059669;
    }

    /* button warna */

    /* Tambahan efek khusus */
    .btn-laporan {
        background-color: #f59e0b;
        box-shadow: 0 4px 6px rgba(245, 158, 11, 0.2);
    }

    .btn-laporan:before {
        background-color: #d97706;
    }

    .btn-laporan:hover {
        box-shadow: 0 10px 20px rgba(245, 158, 11, 0.3);
    }

    /* Tombol ukuran kecil */
    .btn-small {
        padding: 0.5rem 1.25rem;
        font-size: 0.875rem;
        border-radius: 0.375rem;
    }

    .btn-bts {
        background-color: #6366f1;
        box-shadow: 0 4px 6px rgba(99, 102, 241, 0.2);
    }

    .btn-bts:before {
        background-color: #4f46e5;
    }

    .btn-bts:hover {
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
    }

    .btn-nagari {
        background-color: #10b981;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
    }

    .btn-nagari:before {
        background-color: #059669;
    }

    .btn-nagari:hover {
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    .btn-jorong {
        background-color: #8b5cf6;
        box-shadow: 0 4px 6px rgba(139, 92, 246, 0.2);
    }

    .btn-jorong:before {
        background-color: #7c3aed;
    }

    .btn-jorong:hover {
        box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);
    }

    body.dark .btn-laporan {
        background-color: #f59e0b;
        box-shadow: 0 4px 6px rgba(245, 158, 11, 0.3);
    }

    body.dark .btn-laporan:before {
        background-color: #d97706;
    }

    body.dark .btn-laporan:hover {
        box-shadow: 0 10px 20px rgba(245, 158, 11, 0.4);
    }

    body.dark .btn-bts {
        background-color: #6366f1;
        box-shadow: 0 4px 6px rgba(99, 102, 241, 0.3);
    }

    body.dark .btn-bts:before {
        background-color: #4f46e5;
    }

    body.dark .btn-bts:hover {
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
    }

    body.dark .btn-nagari {
        background-color: #10b981;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3);
    }

    body.dark .btn-nagari:before {
        background-color: #059669;
    }

    body.dark .btn-nagari:hover {
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
    }

    body.dark .btn-jorong {
        background-color: #8b5cf6;
        box-shadow: 0 4px 6px rgba(139, 92, 246, 0.3);
    }

    body.dark .btn-jorong:before {
        background-color: #7c3aed;
    }

    body.dark .btn-jorong:hover {
        box-shadow: 0 10px 20px rgba(139, 92, 246, 0.4);
    }


    /* Table styles */
    .table-responsive {
        margin-top: 2rem;
    }

    .table th {
        background-color: #2f55d4;
        color: white;
    }

    .table td {
        vertical-align: middle;
    }

    .badge {
        padding: 0.5em 1em;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .bg-warning {
        background-color: #ffc107 !important;
    }

    .bg-primary {
        background-color: #0d6efd !important;
    }

    .bg-secondary {
        background-color: #6c757d !important;
    }

    .bg-info {
        background-color: #0dcaf0 !important;
    }

    .bg-success {
        background-color: #198754 !important;
    }

    /* Ticket Search Styles */
    .ticket-search-container {
        margin-top: 2rem;
        width: 100%;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .ticket-search-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1e40af;
        margin-bottom: 1rem;
        text-align: center;
    }

    body.dark .ticket-search-title {
        color: #60a5fa;
    }

    .ticket-search-form {
        width: 100%;
    }

    .ticket-search-input-group {
        display: flex;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .ticket-search-input-group:focus-within {
        box-shadow: 0 10px 15px rgba(37, 99, 235, 0.2);
        transform: translateY(-2px);
    }

    body.dark .ticket-search-input-group {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    body.dark .ticket-search-input-group:focus-within {
        box-shadow: 0 10px 15px rgba(59, 130, 246, 0.3);
    }

    /* Card styles for mobile */
    @media (max-width: 768px) {


        .row {
            margin-left: -10px;
            margin-right: -10px;
        }

        .col-md-4 {
            padding-left: 10px;
            padding-right: 10px;
        }


    }
</style>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
</head>

<body class="flex flex-col min-h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="stars" id="stars"></div>
    </div>

    <!-- Main Content Wrapper -->
    <div class="flex flex-col flex-1">
        <!-- Header -->


        <!-- Header -->
        <header class="header">
            <div class="logo-container">
                <!-- Logo dan Nama Aplikasi yang bisa diklik -->
                <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90">
                    <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung"
                        class="logo">
                    <div>
                        <h1 class="app-title">{{ config('app.name') }}</h1>
                        <p class="app-subtitle">Sistem Informasi Infrastruktur TI</p>
                    </div>
                    <img src="{{ asset('images/logo-geopark.png') }}" alt="Logo Geopark Silokek"
                        style="height: 40px; width: auto;">
                </a>
            </div>
            <div class="d-flex align-items-center">
                <!-- Desktop Navigation -->
                <nav class="d-none d-md-flex align-items-center me-4">
                    <a href="{{ route('public.laporform') }}"
                        class="me-4 text-decoration-none text-dark dark:text-white">
                        <i class="fas fa-plus-circle me-1"></i> Buat Laporan
                    </a>
                    <a href="{{ route('list.laporan') }}" class="me-4 text-decoration-none text-dark dark:text-white">
                        <i class="fas fa-list me-1"></i> Daftar Laporan
                    </a>
                    <a href="{{ route('list.bts') }}" class="me-4 text-decoration-none text-dark dark:text-white">
                        <i class="fas fa-broadcast-tower me-1"></i> Data BTS
                    </a>
                    <a href="{{ route('list.nagari') }}" class="me-4 text-decoration-none text-dark dark:text-white">
                        <i class="fas fa-map-marker-alt me-1"></i> Data Nagari
                    </a>
                    <a href="{{ route('list.jorong') }}" class="me-4 text-decoration-none text-dark dark:text-white">
                        <i class="fas fa-map me-1"></i> Data Jorong
                    </a>

                    <a href="{{ route('login') }}" class="btn-icon" title="Hanya untuk member area">
                        <i class="fas fa-user"></i>
                    </a>
                </nav>


                <div class="theme-toggle me-3" id="theme-toggle"></div>
                <div class="mobile-menu-toggle" id="mobileMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </header>

        <!-- Mega Menu -->
        <div class="mega-menu" id="megaMenu">
            <div class="mega-menu-content">
                <button class="mega-menu-close" id="megaMenuClose" aria-label="Tutup Menu">&times;</button>
                <div class="mega-menu-section">
                    <h3 class="mega-menu-title dark:text-white">Menu Utama</h3>
                    <div class="mega-menu-links">
                        <a href="{{ asset('/') }}" class="mega-menu-link dark:text-gray-200">Home</a>
                        <a href="list-laporan" class="mega-menu-link dark:text-gray-200">Daftar Laporan</a>
                        <a href="{{ route('list.bts') }}" class="mega-menu-link dark:text-gray-200">Data BTS</a>
                        <a href="{{ route('list.nagari') }}" class="mega-menu-link dark:text-gray-200">Data Nagari</a>
                        <a href="{{ route('list.jorong') }}" class="mega-menu-link dark:text-gray-200">Data Jorong</a>
                    </div>
                </div>
                <div class="mega-menu-section">
                    <h3 class="mega-menu-title dark:text-white">Akses Cepat</h3>
                    <div class="mega-menu-links">
                        <a href="{{ route('public.laporform') }}" class="mega-menu-link dark:text-gray-200">Buat
                            Laporan</a>
                        <a href="{{ route('login') }}" class="mega-menu-link dark:text-gray-200">Login</a>
                    </div>
                </div>
                <div class="mega-menu-section">
                    <h3 class="mega-menu-title dark:text-white">Informasi</h3>
                    <div class="mega-menu-links">
                        <a href="#tentang" class="mega-menu-link dark:text-gray-200">Tentang Aplikasi</a>
                        <a href="#kontak" class="mega-menu-link dark:text-gray-200">Kontak Kami</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- Scroll Handler -->
        <script>
            window.addEventListener('scroll', function() {
                const header = document.querySelector('.header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Initialize header state on page load
            document.addEventListener('DOMContentLoaded', function() {
                const header = document.querySelector('.header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                }
            });
        </script>

        <!-- Custom Scripts -->
        <script>
            // Mobile Menu Toggle
            document.addEventListener('DOMContentLoaded', function() {
                const menuToggle = document.getElementById('mobileMenuToggle');
                const megaMenu = document.getElementById('megaMenu');
                const megaMenuLinks = megaMenu ? megaMenu.querySelectorAll('a') : [];
                const megaMenuClose = document.getElementById('megaMenuClose');

                if (menuToggle && megaMenu) {
                    menuToggle.addEventListener('click', function() {
                        megaMenu.classList.toggle('active');
                    });
                }

                megaMenuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        megaMenu.classList.remove('active');
                    });
                });

                if (megaMenuClose) {
                    megaMenuClose.addEventListener('click', function() {
                        megaMenu.classList.remove('active');
                    });
                }
            });
        </script>

        <script>
            // Create stars
            function createStars() {
                const stars = document.getElementById('stars');
                const count = 100;

                for (let i = 0; i < count; i++) {
                    const star = document.createElement('div');
                    star.className = 'star';
                    star.style.width = `${Math.random() * 3}px`;
                    star.style.height = star.style.width;
                    star.style.left = `${Math.random() * 100}%`;
                    star.style.top = `${Math.random() * 100}%`;
                    star.style.animationDelay = `${Math.random() * 2}s`;
                    stars.appendChild(star);
                }
            }

            // Theme toggle
            function setupThemeToggle() {
                const toggle = document.getElementById('theme-toggle');
                const body = document.body;
                const theme = localStorage.getItem('theme');

                if (theme === 'dark') {
                    body.classList.add('dark');
                    toggle.classList.add('dark');
                }

                toggle.addEventListener('click', () => {
                    body.classList.toggle('dark');
                    toggle.classList.toggle('dark');

                    const currentTheme = body.classList.contains('dark') ? 'dark' : 'light';
                    localStorage.setItem('theme', currentTheme);
                });
            }

            // Interactive landmarks
            function setupLandmarks() {
                const landmarks = document.querySelectorAll('.landmark');

                landmarks.forEach(landmark => {
                    landmark.addEventListener('click', () => {
                        landmark.classList.toggle('clicked');
                        setTimeout(() => {
                            landmark.classList.remove('clicked');
                        }, 1000);
                    });
                });
            }

            // Initialize
            document.addEventListener('DOMContentLoaded', () => {
                createStars();
                setupThemeToggle();
                setupLandmarks();
            });
        </script>

        @livewireScripts
        <!-- Typewriter effect is now handled by Tailwind CSS plugin -->
    </div> <!-- End of flex-1 -->

    {{-- <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 mt-auto">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About Section -->
                <div class="space-y-4">
                    <div class="flex items-center">
                        <img src="{{ asset('images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="h-12 w-auto mr-3">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">Dinas Komunikasi dan Informatika</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Kabupaten Sijunjung</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Menyediakan informasi terbaru seputar infrastruktur dan teknologi informasi di Kabupaten Sijunjung.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors">Beranda</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors">Layanan</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact & Social -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Hubungi Kami</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <i class="fas fa-map-marker-alt mr-3 text-blue-500"></i>
                            <span>Jl. Lintas Sumatra No. 1, Muaro Sijunjung</span>
                        </li>
                        <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <i class="fas fa-phone-alt mr-3 text-blue-500"></i>
                            <span>+62 852 1234 5678</span>
                        </li>
                        <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <i class="fas fa-envelope mr-3 text-blue-500"></i>
                            <span>info@sijunjungkab.go.id</span>
                        </li>
                    </ul>
                    
                    <div class="mt-4">
                        <h4 class="text-sm font-medium text-gray-800 dark:text-white mb-2">Ikuti Kami</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors">
                                <i class="fab fa-facebook-f text-lg"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-400 dark:text-gray-400 dark:hover:text-blue-400 transition-colors">
                                <i class="fab fa-twitter text-lg"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-pink-600 dark:text-gray-400 dark:hover:text-pink-400 transition-colors">
                                <i class="fab fa-instagram text-lg"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-400 transition-colors">
                                <i class="fab fa-youtube text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-200 dark:border-gray-800 mt-8 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kabupaten Sijunjung. All rights reserved.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 transition-colors">Peta Situs</a>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}
</body>

</html>
