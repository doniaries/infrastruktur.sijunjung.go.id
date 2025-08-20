<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Infrastruktur TI - Dinas Kominfo Sijunjung">
    <meta name="keywords"
        content="Dinas Kominfo Sijunjung, infrastruktur TI,Data Infrastruktur TI, laporan gangguan, sistem informasi, laravel, filament, admin panel">
    <meta name="author" content="Admin Panel">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="4K5Ik2HmVn7IBgAeytIkqUr-ScWT7BdxcZZ-bKCyfJQ" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/kabupaten-sijunjung.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

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
        .fas,
        .fab,
        .far,
        .fal,
        .fad {
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

        /* Header scroll effect styles */
        nav {
            transition: all 0.3s ease;
        }

        nav.header-scrolled {
            background-color: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
            backdrop-filter: blur(10px);
        }

        .dark nav.header-scrolled {
            background-color: rgba(15, 23, 42, 0.95) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3) !important;
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

        /* Enhanced Button Hover Effects */
        .btn-primary-enhanced {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-primary-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-primary-enhanced:hover::before {
            left: 100%;
        }

        .btn-primary-enhanced:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.4), 0 5px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 50%, #1e40af 100%);
        }

        .btn-primary-enhanced:active {
            transform: translateY(-1px) scale(1.02);
            transition: all 0.1s ease;
        }

        .btn-export-enhanced {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-export-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-export-enhanced:hover::before {
            left: 100%;
        }

        .btn-export-enhanced:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(220, 38, 38, 0.4), 0 5px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
        }

        .btn-export-enhanced:active {
            transform: translateY(-1px) scale(1.02);
            transition: all 0.1s ease;
        }

        .btn-feature-enhanced {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-feature-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-feature-enhanced:hover::before {
            left: 100%;
        }

        .btn-feature-enhanced:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4), 0 5px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        }

        .btn-feature-enhanced:active {
            transform: translateY(-1px) scale(1.02);
            transition: all 0.1s ease;
        }

        .btn-nav-enhanced {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-nav-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-nav-enhanced:hover::before {
            left: 100%;
        }

        .btn-nav-enhanced:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.4), 0 5px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
        }

        .btn-nav-enhanced:active {
            transform: translateY(-1px) scale(1.02);
            transition: all 0.1s ease;
        }

        .btn-scroll-enhanced {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-scroll-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-scroll-enhanced:hover::before {
            left: 100%;
        }

        .btn-scroll-enhanced:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4), 0 5px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 50%, #1d4ed8 100%);
        }

        .btn-scroll-enhanced:active {
            transform: translateY(-1px) scale(1.02);
            transition: all 0.1s ease;
        }

        .btn-search-enhanced {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-search-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-search-enhanced:hover::before {
            left: 100%;
        }

        .btn-search-enhanced:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(245, 158, 11, 0.4), 0 5px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #b45309 100%);
        }

        .btn-search-enhanced:active {
            transform: translateY(-1px) scale(1.02);
            transition: all 0.1s ease;
        }

        /* Ripple Effect for Buttons */
        .ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Glow Effect for Active States */
        .glow-on-hover {
            transition: all 0.3s ease;
        }

        .glow-on-hover:hover {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.6), 0 0 40px rgba(59, 130, 246, 0.4), 0 0 60px rgba(59, 130, 246, 0.2);
        }

        /* Magnetic Effect */
        .magnetic {
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .magnetic:hover {
            transform: translateY(-5px) scale(1.05);
        }

        /* Shimmer Effect */
        .shimmer {
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.5) 50%, transparent 70%);
            background-size: 200% 200%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% -200%;
            }

            100% {
                background-position: 200% 200%;
            }
        }

        /* Loading State */
        .btn-loading {
            position: relative;
            color: transparent !important;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 50%;
            margin-left: -8px;
            margin-top: -8px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

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

    <script>
        // Enhanced Button Effects JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            // Ripple effect for buttons
            function createRipple(event) {
                const button = event.currentTarget;
                const circle = document.createElement('span');
                const diameter = Math.max(button.clientWidth, button.clientHeight);
                const radius = diameter / 2;

                circle.style.width = circle.style.height = `${diameter}px`;
                circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
                circle.style.top = `${event.clientY - button.offsetTop - radius}px`;
                circle.classList.add('ripple-effect');

                const ripple = button.getElementsByClassName('ripple-effect')[0];
                if (ripple) {
                    ripple.remove();
                }

                button.appendChild(circle);
            }

            // Add ripple effect to all buttons with ripple class
            const rippleButtons = document.querySelectorAll('.ripple');
            rippleButtons.forEach(button => {
                button.addEventListener('click', createRipple);
            });

            // Magnetic effect for buttons
            const magneticButtons = document.querySelectorAll('.magnetic');
            magneticButtons.forEach(button => {
                button.addEventListener('mouseenter', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;

                    this.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px) scale(1.05)`;
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translate(0, 0) scale(1)';
                });
            });

            // Loading state simulation for buttons
            const loadingButtons = document.querySelectorAll('[data-loading]');
            loadingButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.classList.add('btn-loading');
                    this.disabled = true;

                    // Remove loading state after 2 seconds (adjust as needed)
                    setTimeout(() => {
                        this.classList.remove('btn-loading');
                        this.disabled = false;
                    }, 2000);
                });
            });

            // Enhanced hover effects with sound (optional)
            const enhancedButtons = document.querySelectorAll('[class*="-enhanced"]');
            enhancedButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    // Add subtle vibration effect if supported
                    if (navigator.vibrate) {
                        navigator.vibrate(10);
                    }
                });
            });

            // Smooth scroll for scroll buttons
            const scrollButtons = document.querySelectorAll('.btn-scroll-enhanced');
            scrollButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = this.getAttribute('href') || '#top';
                    const element = document.querySelector(target);

                    if (element) {
                        element.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    } else {
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>

    <!-- Script untuk memastikan header tetap pada posisinya saat mode gelap/terang berubah -->
    <script>
        // Set dark mode as default if no preference is set
        if (!localStorage.getItem('color-theme') && !window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }

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
            darkModeObserver.observe(document.documentElement, {
                attributes: true
            });

            // Header scroll effect - menambahkan bayangan saat scroll
            window.addEventListener('scroll', function() {
                const header = document.querySelector('nav');
                if (header) {
                    if (window.scrollY > 50) {
                        header.classList.add('header-scrolled');
                    } else {
                        header.classList.remove('header-scrolled');
                    }
                }
            });
        });
    </script>

    <!-- Navigation Buttons -->
    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 z-50 w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 pointer-events-none transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
        aria-label="Back to top">
        <i class="fas fa-chevron-up text-lg"></i>
    </button>



    <!-- Navigation Buttons Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get button elements
            const backToTopButton = document.getElementById('back-to-top');

            // Function to update button visibility based on scroll position
            function updateButtonsVisibility() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                // Back to Top Button
                if (backToTopButton) {
                    if (scrollTop > 300) {
                        backToTopButton.classList.remove('opacity-0', 'pointer-events-none');
                        backToTopButton.classList.add('opacity-100');
                    } else {
                        backToTopButton.classList.add('opacity-0', 'pointer-events-none');
                        backToTopButton.classList.remove('opacity-100');
                    }
                }
            }

            // Show/hide buttons based on scroll position
            window.addEventListener('scroll', updateButtonsVisibility);

            // Initial check
            updateButtonsVisibility();

            // Back to Top Button Click
            if (backToTopButton) {
                backToTopButton.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>

    <!-- Impersonate Banner -->
    <x-impersonate::banner />
</body>

</html>
