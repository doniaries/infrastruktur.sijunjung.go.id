<!-- Animated Background -->
<div class="animated-bg">
    <div class="stars" id="stars"></div>
</div>

<!-- Header -->
<header class="header">
    <div class="logo-container">
        <!-- Logo dan Nama Aplikasi yang bisa diklik -->
        <a href="{{ url('/') }}" class="transition-opacity logo-container hover:opacity-90">
            <img src="{{ asset('/images/kabupaten-sijunjung.png') }}" alt="Logo Kabupaten Sijunjung" class="logo">
            <div>
                <h1 class="app-title">{{ config('app.name') }}</h1>
                <p class="app-subtitle">Sistem Informasi Infrastruktur TI</p>
            </div>
            <!-- Logo Geopark di sebelah kanan judul -->
            <img src="{{ asset('images/logo-geopark.png') }}" alt="Logo Geopark Silokek"
                style="height: 40px; width: auto;">
        </a>
    </div>
    <div class="d-flex align-items-center">
        <!-- Desktop Navigation -->
        <nav class="d-none d-md-flex align-items-center me-4">
            <a href="{{ route('public.laporform') }}" class="me-4 text-decoration-none text-dark">
                <i class="fas fa-plus-circle me-1"></i> Buat Laporan
            </a>
            <a href="{{ route('list.laporan') }}" class="me-4 text-decoration-none text-dark">
                <i class="fas fa-list me-1"></i> Daftar Laporan
            </a>
            <a href="{{ route('list.bts') }}" class="me-4 text-decoration-none text-dark">
                <i class="fas fa-broadcast-tower me-1"></i> Data BTS
            </a>
        </nav>

        <a href="{{ route('login') }}" class="login-button me-3 d-none d-md-inline-block"
            title="Hanya untuk member area">Login</a>
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
            <h3 class="mega-menu-title">Menu Utama</h3>
            <div class="mega-menu-links">
                <a href="{{ asset('/') }}" class="mega-menu-link">Home</a>
                <a href="{{ route('list.laporan') }}" class="mega-menu-link">Daftar Laporan</a>
                <a href="{{ route('list.bts') }}" class="mega-menu-link">Data BTS</a>
            </div>
        </div>
        <div class="mega-menu-section">
            <h3 class="mega-menu-title">Akses Cepat</h3>
            <div class="mega-menu-links">
                <a href="{{ route('public.laporform') }}" class="mega-menu-link">Buat Laporan</a>
                <a href="{{ route('login') }}" class="mega-menu-link">Login</a>
            </div>
        </div>
        <div class="mega-menu-section">
            <h3 class="mega-menu-title">Informasi</h3>
            <div class="mega-menu-links">
                <a href="#tentang" class="mega-menu-link">Tentang Aplikasi</a>
                <a href="#kontak" class="mega-menu-link">Kontak Kami</a>
            </div>
        </div>
    </div>
</div>

<!-- Include the JavaScript for the header functionality -->
@push('scripts')
<script>
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const megaMenu = document.getElementById('megaMenu');
    const megaMenuClose = document.getElementById('megaMenuClose');

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', () => {
            mobileMenuToggle.classList.toggle('active');
            megaMenu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });
    }

    if (megaMenuClose) {
        megaMenuClose.addEventListener('click', () => {
            mobileMenuToggle.classList.remove('active');
            megaMenu.classList.remove('active');
            document.body.classList.remove('menu-open');
        });
    }

    // Close mega menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!megaMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
            mobileMenuToggle.classList.remove('active');
            megaMenu.classList.remove('active');
            document.body.classList.remove('menu-open');
        }
    });

    // Theme toggle functionality
    const themeToggle = document.getElementById('theme-toggle');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    const currentTheme = localStorage.getItem('theme') || (prefersDarkScheme.matches ? 'dark' : 'light');

    // Set the initial theme
    if (currentTheme === 'dark') {
        document.body.classList.add('dark');
        themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
    } else {
        document.body.classList.remove('dark');
        themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
    }

    // Toggle theme when clicking the theme toggle
    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            const isDark = document.body.classList.toggle('dark');
            if (isDark) {
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
                localStorage.setItem('theme', 'light');
            }
        });
    }

    // Create stars for the background
    function createStars() {
        const starsContainer = document.getElementById('stars');
        if (!starsContainer) return;
        
        // Clear existing stars
        starsContainer.innerHTML = '';
        
        // Create stars
        const starsCount = 200;
        const width = window.innerWidth;
        const height = window.innerHeight;
        
        for (let i = 0; i < starsCount; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            
            // Random position
            const x = Math.random() * width;
            const y = Math.random() * height;
            
            // Random size between 1px and 3px
            const size = Math.random() * 2 + 1;
            
            // Random animation delay
            const delay = Math.random() * 2;
            
            star.style.left = `${x}px`;
            star.style.top = `${y}px`;
            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.animationDelay = `${delay}s`;
            
            starsContainer.appendChild(star);
        }
    }

    // Initialize stars on page load
    document.addEventListener('DOMContentLoaded', createStars);
    
    // Recreate stars on window resize
    window.addEventListener('resize', createStars);

    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
</script>
@endpush
