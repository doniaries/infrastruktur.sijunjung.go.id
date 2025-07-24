<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Sistem Informasi Infrastruktur TI - Aplikasi berbasis Laravel dengan Filament Admin Panel">
    <meta name="keywords" content="infrastruktur, sistem informasi, laravel, filament, admin panel">
    <meta name="author" content="Admin Panel">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="4K5Ik2HmVn7IBgAeytIkqUr-ScWT7BdxcZZ-bKCyfJQ" />

    {{-- <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Lapor Infrastruktur | Aplikasi Manajemen Infrastruktur">
    <meta property="og:description"
        content="Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat. Sistem ini membantu Anda melacak laporan secara real-time.">
    <meta property="og:image" content="{{ asset('front/images/logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Lapor Infrastruktur | Aplikasi Manajemen Infrastruktur">
    <meta property="twitter:description"
        content="Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat. Sistem ini membantu Anda melacak laporan secara real-time.">
    <meta property="twitter:image" content="{{ asset('front/images/logo.png') }}"> --}}
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/kabupaten-sijunjung.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700"
        rel="stylesheet" />

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Global Font Family */
        * {
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji' !important;
        }
        
        body {
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji' !important;
        }
        
        /* Font Awesome Icons Fix */
        .fas, .fab, .far, .fal, .fad {
            font-family: "Font Awesome 6 Free", "Font Awesome 6 Brands" !important;
            font-weight: 900 !important;
            display: inline-block !important;
        }
        
        .fab {
            font-family: "Font Awesome 6 Brands" !important;
            font-weight: 400 !important;
        }
        
        /* Theme Toggle Icon Fix */
        #theme-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        #theme-toggle i {
            transition: all 0.3s ease;
        }
        
        /* Ensure only one icon shows at a time */
        #theme-toggle .hidden {
            display: none !important;
        }
        
        #theme-toggle .block {
            display: inline-block !important;
        }
        
        .dark #theme-toggle .dark\:hidden {
            display: none !important;
        }
        
        .dark #theme-toggle .dark\:block {
            display: inline-block !important;
        }
        
        /* Leaflet Map Z-index Fix */
        .leaflet-map-pane,
        .leaflet-tile,
        .leaflet-marker-icon,
        .leaflet-marker-shadow,
        .leaflet-tile-pane,
        .leaflet-overlay-pane,
        .leaflet-shadow-pane,
        .leaflet-marker-pane,
        .leaflet-popup-pane {
            z-index: 1 !important;
        }

        .leaflet-control {
            z-index: 10 !important;
        }

        /* Ensure map container has lower z-index than header */
        #btsMap {
            position: relative;
            z-index: 1;
        }

        /* Ensure header has higher z-index */
        .sticky.top-0 {
            z-index: 1000 !important;
        }

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: currentColor;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            display: none;
        }

        .mobile-menu.open {
            max-height: 1000px;
            transition: max-height 0.5s ease-in;
            display: block;
        }

        /* Memastikan menu desktop selalu tampil pada layar medium dan lebih besar */
        @media (min-width: 768px) {
            .md\:flex {
                display: flex !important;
            }
        }

        .badge {
            font-size: 0.65rem;
            top: -0.5rem;
            right: -0.5rem;
        }

        .avatar-ring {
            box-shadow: 0 0 0 2px white, 0 0 0 4px var(--primary-600);
        }

        /* Dark mode adjustments for navbar */
        .dark .bg-white {
            background-color: #0f172a;
            /* bg-slate-900 - darker for better contrast */
        }

        .dark .text-gray-700 {
            color: #f1f5f9;
            /* text-slate-100 - much brighter for strong contrast */
        }

        .dark .text-gray-800 {
            color: #f8fafc;
            /* text-slate-50 - brightest for maximum contrast */
        }

        .dark .hover\:bg-primary-50:hover {
            background-color: rgba(59, 130, 246, 0.2);
            /* slightly more visible blue */
        }

        .dark .border-gray-200 {
            border-color: #334155;
            /* border-slate-700 */
        }

        .dark .bg-primary-100 {
            background-color: rgba(59, 130, 246, 0.3);
            /* more visible blue background */
        }

        .dark .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5), 0 4px 6px -4px rgba(0, 0, 0, 0.5);
        }

        /* Additional dark mode improvements */
        .dark h1,
        .dark h2,
        .dark h3,
        .dark h4,
        .dark h5,
        .dark h6 {
            color: #f8fafc !important;
            /* text-slate-50 - ensure all headings are visible */
        }

        .dark p {
            color: #e2e8f0 !important;
            /* text-slate-200 - ensure all paragraphs are visible */
        }

        .dark .text-primary-600,
        .dark .text-primary-700 {
            color: #93c5fd !important;
            /* text-blue-300 - brighter blue for dark backgrounds */
        }

        .dark .bg-gray-50 {
            background-color: #0f172a;
            /* bg-slate-900 */
        }

        .dark .bg-gray-100 {
            background-color: #1e293b;
            /* bg-slate-800 */
        }
    </style>
    {{-- <style>
        [x-cloak] {
            display: none !important;
        }

        /* Perbaikan untuk judul tabel */
        th {
            color: white !important;
        }

        /* Memastikan teks dalam tabel terlihat jelas */
        .dark th {
            color: white !important;
            background-color: #1e40af !important;
            /* bg-blue-800 - darker blue for better contrast */
        }

        /* Memastikan teks dalam tabel terlihat jelas di mode light */
        table thead tr th {
            color: white !important;
        }

        /* Perbaikan untuk tabel di mode light dan dark */
        table {
            border-collapse: separate;
            border-spacing: 0;
        }

        /* Memastikan kontras yang baik untuk header tabel */
        thead.bg-gradient-to-r {
            color: white !important;
        }

        /* Memastikan teks dalam tabel body terlihat jelas */
        tbody td {
            color: #1a202c !important;
        }

        /* Memastikan teks dalam tabel body terlihat jelas di mode dark */
        .dark tbody td {
            color: #f1f5f9 !important;
            /* text-slate-100 - much brighter for better contrast */
        }

        /* Perbaikan untuk batas tabel di dark mode */
        .dark table,
        .dark th,
        .dark td {
            border-color: #475569 !important;
            /* border-slate-600 - more visible borders */
        }

        /* Perbaikan untuk tabel yang menggunakan Livewire Tables */
        .filament-tables-header-cell {
            color: rgb(255, 253, 253) !important;
            background-color: #1e40af !important;
        }

        /* Memastikan teks dalam tabel Livewire terlihat jelas di mode dark */
        .dark .filament-tables-header-cell {
            color: white !important;
            background-color: #1e3a8a !important;
        }

        /* Memastikan teks dalam header tabel terlihat jelas di mode dark */
        .dark thead tr.text-white th {
            color: white !important;
        }

        /* Memastikan teks dalam header tabel dengan gradient terlihat jelas di mode dark */
        .dark thead.bg-gradient-to-r th {
            color: white !important;
        }

        /* Gaya untuk h1 dipindahkan ke filament.css */

        /* Perbaikan untuk semua heading di dark mode */
        .dark .text-gray-800 {
            color: #f8fafc !important;
            /* text-slate-50 - brightest white */
        }

        /* Perbaikan tambahan untuk judul di dark mode */
        .dark [class*="text-gray-800"] {
            color: #f8fafc !important;
            /* text-slate-50 - brightest white */
        }

        /* Memastikan judul terlihat di dark mode */
        .dark .text-2xl {
            color: #f8fafc !important;
            /* text-slate-50 - brightest white */
        }

        /* Perbaikan untuk teks paragraf di dark mode */
        .dark p {
            color: #e2e8f0 !important;
            /* text-slate-200 - bright enough for good readability */
        }

        /* Perbaikan untuk link di dark mode */
        .dark a:not(.btn):not(.nav-link) {
            color: #60a5fa !important;
            /* text-blue-400 - bright blue for links */
        }

        .dark a:hover:not(.btn):not(.nav-link) {
            color: #93c5fd !important;
            /* text-blue-300 - even brighter on hover */
            text-decoration: underline;
        }

        /* Perbaikan untuk button di dark mode */
        .dark .bg-primary-700 {
            background-color: #1d4ed8 !important;
            /* bg-blue-700 - brighter blue */
        }

        .dark .hover\:bg-primary-800:hover {
            background-color: #1e40af !important;
            /* bg-blue-800 - slightly darker on hover */
        }
    </style> --}}
    {{-- Scripts --}}
    <script src="https://www.google.com/recaptcha/api.js"></script>
    {{-- Alpine.js sudah dimuat di app.blade.php utama --}}

    @filamentStyles
    @vite(['resources/css/app.css', 'resources/css/filament.css', 'resources/js/app.js'])
    

</head>

<body class="antialiased bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen" id="body-element">
    
    @include('partials.header')

    <main>
        {{ $slot }}
    </main>

    @include('partials.footer')

    @livewire('notifications')
    {{-- @livewire('database-notifications') --}}

    @filamentScripts
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- Tidak perlu mengimpor app.js lagi karena sudah diimpor di bagian head --}}
    
    <!-- Script untuk memastikan header tetap pada posisinya saat mode gelap/terang berubah -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pastikan header tetap pada posisinya saat mode gelap/terang berubah
            const darkModeObserver = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'class') {
                        // Pastikan header tetap pada posisinya
                        const header = document.querySelector('nav');
                        if (header) {
                            header.style.position = 'sticky';
                            header.style.top = '0';
                            header.style.zIndex = '1000';
                        }
                    }
                });
            });
            
            // Amati perubahan pada class di html element (untuk deteksi perubahan mode gelap/terang)
            darkModeObserver.observe(document.documentElement, { attributes: true });
        });
    </script>
</body>

</html>
