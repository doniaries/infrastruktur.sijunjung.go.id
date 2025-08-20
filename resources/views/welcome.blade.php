<x-layouts.app>
    <!-- ==============================================
        EXTERNAL DEPENDENCIES
    ================================================ -->
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Leaflet for Maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- ==============================================
        HERO SECTION
    ================================================ -->
    <section id="hero"
        class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white py-12 sm:py-16 md:py-24 relative overflow-hidden"
        data-aos="fade-up">
        <!-- Background Effects -->
        <div id="background-effects" class="absolute inset-0 pointer-events-none"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <!-- Hero Content -->
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
                <h1
                    class="mb-4 sm:mb-6 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                    <span class="block">Bank Data</span>
                    <span class="block text-blue-600 dark:text-blue-400 mt-1 sm:mt-2">Infrastruktur TI Sijunjung</span>
                </h1>

                <p
                    class="mx-auto max-w-2xl text-base sm:text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8 sm:mb-10 px-3 sm:px-0">
                    Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat.
                    Sistem ini membantu Anda melacak laporan secara real-time.
                </p>

            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
            <a href="#features-section"
                class="text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                <span class="sr-only">Scroll down</span>
                <svg class="h-8 w-8 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </section>

    {{-- <!-- ==============================================
        FEATURES SECTION
    ================================================ -->
    <section id="features-section" class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white py-16">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6 relative z-10" data-aos="fade-left">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                    Layanan Kami
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                    Berbagai layanan yang tersedia untuk mendukung kebutuhan infrastruktur TI Anda
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8 px-4 sm:px-0">
                <!-- Feature 1: Laporan Gangguan -->
                <div
                    class="bg-white dark:bg-gray-700 p-4 sm:p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-primary-200 dark:border-primary-900 h-full flex flex-col">
                    <div class="flex justify-center items-center mb-3 sm:mb-4 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-100 dark:bg-primary-900"
                        data-aos="zoom-in" data-aos-delay="100">
                        <i class="fas fa-file-alt text-primary-600 text-xl dark:text-primary-300"></i>
                    </div>
                    <h3 class="mb-2 text-lg sm:text-xl font-bold dark:text-white">Laporan Gangguan</h3>
                    <p class="text-sm sm:text-base text-gray-500 dark:text-gray-300 mb-4 flex-grow">
                        Laporkan gangguan jaringan dengan mudah dan cepat. Sistem akan mengirimkan notifikasi kepada
                        petugas terkait.
                    </p>
                    <a href="{{ url('/list-laporan') }}"
                        class="inline-flex items-center justify-center px-3 sm:px-4 py-2 text-xs sm:text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors duration-300 btn-feature-enhanced w-full sm:w-auto text-center">
                        <i class="fas fa-arrow-right mr-1 sm:mr-2"></i> Lihat Laporan
                    </a>
                </div>
                <!-- Feature 2: Pemetaan BTS -->
                <div
                    class="bg-white dark:bg-gray-700 p-4 sm:p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-primary-200 dark:border-primary-900 h-full flex flex-col">
                    <div class="flex justify-center items-center mb-3 sm:mb-4 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-100 dark:bg-primary-900"
                        data-aos="zoom-in" data-aos-delay="150">
                        <i class="fas fa-broadcast-tower text-primary-600 text-xl dark:text-primary-300"></i>
                    </div>
                    <h3 class="mb-2 text-lg sm:text-xl font-bold dark:text-white">Pemetaan BTS</h3>
                    <p class="text-sm sm:text-base text-gray-500 dark:text-gray-300 mb-4 flex-grow">
                        Lihat lokasi dan informasi mengenai Base Transceiver
                        Station (BTS) yang tersebar di Kabupaten Sijunjung.</p>
                    <a href="{{ url('/list-bts') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors duration-300 btn-feature-enhanced ripple">
                        <i class="fas fa-map-marker-alt mr-2"></i> Lihat BTS
                    </a>
                </div>
                <div
                    class="bg-white dark:bg-gray-700 p-4 sm:p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-primary-200 dark:border-primary-900 h-full flex flex-col">
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900"
                        data-aos="zoom-in" data-aos-delay="100">
                        <i class="fas fa-map text-primary-600 lg:text-xl dark:text-primary-300"></i>
                    </div>
                    <h3 class="mb-2 text-lg sm:text-xl font-bold dark:text-white">Data Nagari</h3>
                    <p class="text-sm sm:text-base text-gray-500 dark:text-gray-300 mb-4 flex-grow">Akses informasi tentang Nagari di Kabupaten
                        Sijunjung beserta infrastruktur yang tersedia di wilayah tersebut.</p>
                    <a href="{{ url('/list-nagari') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors duration-300 btn-feature-enhanced ripple">
                        <i class="fas fa-list mr-2"></i> Lihat Nagari
                    </a>
                </div>
                <div
                    class="bg-white dark:bg-gray-700 p-4 sm:p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-primary-200 dark:border-primary-900 h-full flex flex-col">
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900"
                        data-aos="zoom-in" data-aos-delay="100">
                        <i class="fas fa-home text-primary-600 lg:text-xl dark:text-primary-300"></i>
                    </div>
                    <h3 class="mb-2 text-lg sm:text-xl font-bold dark:text-white">Data Jorong</h3>
                    <p class="text-sm sm:text-base text-gray-500 dark:text-gray-300 mb-4 flex-grow">Akses informasi tentang Jorong di Kabupaten
                        Sijunjung beserta infrastruktur yang tersedia di wilayah tersebut.</p>
                    <a href="{{ url('/list-jorong') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors duration-300 btn-feature-enhanced ripple">
                        <i class="fas fa-list-alt mr-2"></i> Lihat Jorong
                    </a>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- BTS Map Section -->
    <section id="bts-map" class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white py-10 sm:py-16">
        <div class="py-6 sm:py-8 px-4 mx-auto max-w-screen-xl lg:px-6" data-aos="fade-right">
            <div class="max-w-4xl mx-auto text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Peta BTS Kabupaten
                    Sijunjung</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-300">Lokasi Base Transceiver Station (BTS) yang
                    tersebar di seluruh Kabupaten Sijunjung.</p>
            </div>
            <div class="w-full h-96 rounded-lg overflow-hidden shadow-lg relative" style="z-index: 1;">
                <div id="btsMap" class="w-full h-full"></div>
            </div>
        </div>
    </section>

    {{-- <!-- Lapor Section -->
    <section id="lapor" class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Laporkan Gangguan
                </h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">Silakan isi formulir di bawah ini untuk
                    melaporkan gangguan jaringan atau infrastruktur TI di wilayah Anda.</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <!-- Form akan ditambahkan di sini -->
                <p class="text-center text-gray-500 dark:text-gray-400">Form laporan akan segera tersedia.</p>
            </div>
        </div>
    </section> --}}

    <!-- Stats Section -->
    <section id="stats-section" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white py-10 sm:py-16">
        <div class="py-8 sm:py-12 px-4 mx-auto max-w-screen-xl lg:px-6" data-aos="fade-left">
            <div class="max-w-screen-md mb-10 lg:mb-16 text-center mx-auto">
                <h2
                    class="mb-4 text-2xl sm:text-3xl md:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Statistik Infrastruktur
                </h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-300">Data statistik infrastruktur di Kabupaten
                    Sijunjung</p>
            </div>
            <div class="relative">
                <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
                    <div class="max-w-4xl mx-auto">
                        <dl
                            class="bg-white dark:bg-gray-700 rounded-lg shadow-lg sm:grid sm:grid-cols-3 overflow-hidden dark:border dark:border-gray-600">
                            <div
                                class="flex flex-col p-8 text-center border-b border-gray-100 dark:border-gray-700 sm:border-0 sm:border-r transition-all duration-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500 dark:text-gray-300">
                                    BTS
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold leading-none text-primary-600 dark:text-blue-300"
                                    id="btsCount">
                                    0
                                </dd>
                            </div>
                            <div
                                class="flex flex-col p-8 text-center border-t border-b border-gray-100 dark:border-gray-700 sm:border-0 sm:border-l sm:border-r transition-all duration-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500 dark:text-gray-300">
                                    Nagari
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold leading-none text-primary-600 dark:text-blue-300"
                                    id="nagariCount">
                                    0
                                </dd>
                            </div>
                            <div
                                class="flex flex-col p-8 text-center border-t border-gray-100 dark:border-gray-700 sm:border-0 sm:border-l transition-all duration-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500 dark:text-gray-300">
                                    Jorong
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold leading-none text-primary-600 dark:text-blue-300"
                                    id="jorongCount">
                                    0
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kecamatan Section -->
        <section id="kecamatan-section" class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white py-16">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6" data-aos="fade-up">
                <div class="max-w-screen-md mb-10 lg:mb-16 text-center mx-auto">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Daftar
                        Kecamatan
                    </h2>
                    <p class="text-gray-500 dark:text-gray-300 sm:text-xl">
                        Eksplorasi daftar kecamatan di Kabupaten Sijunjung beserta informasi terkait.
                    </p>
                </div>

                <!-- Kecamatan List Component -->
                <div class="mt-8">
                    @livewire('list-kecamatan')
                </div>
            </div>
        </section>

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <!-- BTS Map Script -->

        <script>
            // Initialize AOS (Animate On Scroll)
            document.addEventListener('DOMContentLoaded', function() {
                AOS.init({
                    duration: 800,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 100,
                    mirror: true
                });

                // Initialize Leaflet Map
                const map = L.map('btsMap').setView([-0.6477, 101.3184], 9); // Koordinat Sijunjung

                // Add OpenStreetMap base layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 19
                }).addTo(map);

                // Ambil data BTS dari API
                fetch('/bts-map-data')
                    .then(response => response.json())
                    .then(data => {
                        // Tambahkan marker untuk setiap BTS
                        data.forEach(bts => {
                            if (bts.lat && bts.lng) {
                                const marker = L.marker([parseFloat(bts.lat), parseFloat(bts.lng)]).addTo(
                                    map);

                                // Tambahkan popup dengan informasi BTS
                                marker.bindPopup(`
                                <div class="bts-popup min-w-[250px] p-3 bg-white dark:bg-gray-800 rounded shadow-lg">
                                    <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-gray-900 border-b pb-2">${bts.pemilik || 'Tidak diketahui'}</h3>
                                    <div class="space-y-1.5">
                                        <p class="text-sm">
                                            <span class="font-semibold text-gray-700">Alamat:</span>
                                            <span class="text-gray-800">${bts.alamat || 'Tidak diketahui'}</span>
                                        </p>
                                        <p class="text-sm">
                                            <span class="font-semibold text-gray-700">Teknologi:</span>
                                            <span class="text-gray-800">${bts.teknologi || 'Tidak diketahui'}</span>
                                        </p>
                                        <p class="text-sm">
                                            <span class="font-semibold text-gray-700">Status:</span>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium ${
                                                bts.status === 'Aktif' ? 'bg-green-100 text-green-800' : 
                                                bts.status === 'Non-Aktif' ? 'bg-red-100 text-red-800' :
                                                'bg-yellow-100 text-yellow-800'
                                            }">
                                                ${bts.status || 'Tidak diketahui'}
                                            </span>
                                        </p>
                                        <p class="text-sm">
                                            <span class="font-semibold text-gray-700">Tahun Bangun:</span>
                                            <span class="text-gray-800">${bts.tahun_bangun || 'Tidak diketahui'}</span>
                                        </p>
                                    </div>
                                </div>
                            `);
                            }
                        });

                        // Smooth Scrolling Navigation
                        document.addEventListener('DOMContentLoaded', function() {
                            // Add smooth scrolling behavior to HTML
                            document.documentElement.style.scrollBehavior = 'smooth';

                            // Create floating navigation
                            const floatingNav = document.createElement('div');
                            floatingNav.id = 'floating-nav';
                            floatingNav.className =
                                'fixed right-2 sm:right-4 top-1/2 transform -translate-y-1/2 z-50 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-full shadow-lg border border-gray-200/50 dark:border-gray-700/50 p-1 sm:p-2 opacity-0 transition-all duration-300';

                            const navItems = [{
                                    id: 'hero',
                                    icon: 'fas fa-home',
                                    title: 'Beranda'
                                },
                                {
                                    id: 'features-section',
                                    icon: 'fas fa-th-large',
                                    title: 'Fitur'
                                },
                                {
                                    id: 'bts-map',
                                    icon: 'fas fa-map',
                                    title: 'Peta BTS'
                                },
                                {
                                    id: 'stats-section',
                                    icon: 'fas fa-chart-bar',
                                    title: 'Statistik'
                                }
                            ];

                            navItems.forEach((item, index) => {
                                const navButton = document.createElement('button');
                                navButton.className =
                                    'flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full mb-2 last:mb-0 bg-gray-100/80 dark:bg-gray-700/80 hover:bg-blue-500 dark:hover:bg-blue-600 text-gray-600 dark:text-gray-300 hover:text-white transition-all duration-200 relative group btn-nav-enhanced glow-on-hover';
                                navButton.innerHTML =
                                    `<i class="${item.icon} text-xs sm:text-sm"></i>`;
                                navButton.title = item.title;

                                // Add tooltip
                                const tooltip = document.createElement('div');
                                tooltip.className =
                                    'absolute right-full mr-3 top-1/2 transform -translate-y-1/2 bg-gray-900 dark:bg-gray-700 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap pointer-events-none';
                                tooltip.textContent = item.title;
                                navButton.appendChild(tooltip);

                                navButton.addEventListener('click', () => {
                                    const targetSection = document.getElementById(item.id);
                                    if (targetSection) {
                                        targetSection.scrollIntoView({
                                            behavior: 'smooth',
                                            block: 'start'
                                        });
                                    }
                                });

                                floatingNav.appendChild(navButton);
                            });

                            document.body.appendChild(floatingNav);

                            // Show/hide floating nav based on scroll position
                            let lastScrollY = window.scrollY;
                            let ticking = false;

                            function updateFloatingNav() {
                                const scrollY = window.scrollY;
                                const windowHeight = window.innerHeight;

                                // Show nav after scrolling past hero section
                                if (scrollY > windowHeight * 0.3) {
                                    floatingNav.style.opacity = '1';
                                    floatingNav.style.transform = 'translateY(-50%) translateX(0)';
                                } else {
                                    floatingNav.style.opacity = '0';
                                    floatingNav.style.transform = 'translateY(-50%) translateX(20px)';
                                }

                                // Update active state based on current section
                                const sections = navItems.map(item => document.getElementById(item.id));
                                const navButtons = floatingNav.querySelectorAll('button');

                                sections.forEach((section, index) => {
                                    if (section) {
                                        const rect = section.getBoundingClientRect();
                                        const isActive = rect.top <= windowHeight * 0.3 && rect
                                            .bottom >= windowHeight * 0.3;

                                        if (isActive) {
                                            navButtons.forEach(btn => btn.classList.remove(
                                                'bg-blue-500', 'dark:bg-blue-600',
                                                'text-white'));
                                            navButtons[index].classList.add('bg-blue-500',
                                                'dark:bg-blue-600', 'text-white');
                                        }
                                    }
                                });

                                lastScrollY = scrollY;
                                ticking = false;
                            }

                            function requestTick() {
                                if (!ticking) {
                                    requestAnimationFrame(updateFloatingNav);
                                    ticking = true;
                                }
                            }

                            window.addEventListener('scroll', requestTick);

                            // Initial check
                            updateFloatingNav();

                            // Create scroll to top button
                            const scrollTopBtn = document.createElement('button');
                            scrollTopBtn.id = 'scroll-top-btn';
                            scrollTopBtn.className =
                                'fixed bottom-6 right-6 w-12 h-12 bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white rounded-full shadow-lg opacity-0 transition-all duration-300 z-40 flex items-center justify-center btn-scroll-enhanced glow-on-hover ripple';
                            scrollTopBtn.innerHTML = '<i class="fas fa-arrow-up text-lg"></i>';
                            scrollTopBtn.title = 'Kembali ke atas';

                            scrollTopBtn.addEventListener('click', () => {
                                window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth'
                                });
                            });

                            // Enhanced Button Effects
                            function initButtonEffects() {
                                // Magnetic effect for large buttons
                                const magneticButtons = document.querySelectorAll('.btn-primary-enhanced');
                                magneticButtons.forEach(button => {
                                    button.addEventListener('mousemove', (e) => {
                                        const rect = button.getBoundingClientRect();
                                        const x = e.clientX - rect.left - rect.width / 2;
                                        const y = e.clientY - rect.top - rect.height / 2;

                                        const moveX = x * 0.1;
                                        const moveY = y * 0.1;

                                        button.style.transform =
                                            `translate(${moveX}px, ${moveY}px) scale(1.05)`;
                                    });

                                    button.addEventListener('mouseleave', () => {
                                        button.style.transform =
                                            'translate(0px, 0px) scale(1)';
                                    });
                                });

                                // Add ripple effect to buttons
                                const rippleButtons = document.querySelectorAll('.ripple');
                                rippleButtons.forEach(button => {
                                    button.addEventListener('click', function(e) {
                                        const ripple = document.createElement('span');
                                        const rect = this.getBoundingClientRect();
                                        const size = Math.max(rect.width, rect.height);
                                        const x = e.clientX - rect.left - size / 2;
                                        const y = e.clientY - rect.top - size / 2;

                                        ripple.style.width = ripple.style.height = size +
                                            'px';
                                        ripple.style.left = x + 'px';
                                        ripple.style.top = y + 'px';
                                        ripple.classList.add('ripple-effect');

                                        this.appendChild(ripple);

                                        setTimeout(() => {
                                            ripple.remove();
                                        }, 600);
                                    });
                                });

                                // Button loading state simulation
                                const featureButtons = document.querySelectorAll('.btn-feature-enhanced');
                                featureButtons.forEach(button => {
                                    button.addEventListener('click', function(e) {
                                        if (!this.classList.contains('btn-loading')) {
                                            e.preventDefault();
                                            this.classList.add('btn-loading');
                                            const originalText = this.innerHTML;
                                            this.innerHTML =
                                                '<span style="opacity: 0;">Loading...</span>';

                                            setTimeout(() => {
                                                this.classList.remove(
                                                    'btn-loading');
                                                this.innerHTML = originalText;
                                                // Simulate navigation
                                                window.location.href = this.href;
                                            }, 1500);
                                        }
                                    });
                                });

                                // Enhanced hover effects for navigation buttons
                                const navButtons = document.querySelectorAll('.btn-nav-enhanced');
                                navButtons.forEach(button => {
                                    button.addEventListener('mouseenter', function() {
                                        this.style.transform = 'scale(1.15) rotate(5deg)';
                                    });

                                    button.addEventListener('mouseleave', function() {
                                        this.style.transform = 'scale(1) rotate(0deg)';
                                    });
                                });
                            }

                            // Initialize button effects
                            initButtonEffects();

                            document.body.appendChild(scrollTopBtn);

                            // Show/hide scroll to top button
                            function updateScrollTopBtn() {
                                const scrollY = window.scrollY;
                                const windowHeight = window.innerHeight;

                                if (scrollY > windowHeight * 0.5) {
                                    scrollTopBtn.style.opacity = '1';
                                    scrollTopBtn.style.transform = 'translateY(0)';
                                } else {
                                    scrollTopBtn.style.opacity = '0';
                                    scrollTopBtn.style.transform = 'translateY(20px)';
                                }
                            }

                            // Add scroll to top button to scroll listener
                            const originalRequestTick = requestTick;
                            requestTick = function() {
                                if (!ticking) {
                                    requestAnimationFrame(() => {
                                        updateFloatingNav();
                                        updateScrollTopBtn();
                                        ticking = false;
                                    });
                                    ticking = true;
                                }
                            };

                            // Update scroll listener
                            window.removeEventListener('scroll', originalRequestTick);
                            window.addEventListener('scroll', requestTick);

                            // Initial check for scroll top button
                            updateScrollTopBtn();
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching BTS data:', error);
                    });
            });
        </script>

        <!-- Stats Counter Animation Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ambil data statistik dari API
                fetch('/stats-data')
                    .then(response => response.json())
                    .then(data => {
                        // Define targets with their elements, final counts, and suffixes
                        const targets = [{
                                element: document.getElementById('btsCount'),
                                count: data.bts_count,
                                suffix: '',
                                color: '#4F46E5'
                            },
                            {
                                element: document.getElementById('nagariCount'),
                                count: data.nagari_count,
                                suffix: '',
                                color: '#4F46E5'
                            },
                            {
                                element: document.getElementById('jorongCount'),
                                count: data.jorong_count,
                                suffix: '',
                                color: '#4F46E5'
                            }
                        ];

                        // Mulai animasi setelah data diambil
                        initializeCounterAnimation(targets);
                    })
                    .catch(error => {
                        console.error('Error fetching stats data:', error);
                        // Fallback ke nilai default jika terjadi error
                        const fallbackTargets = [{
                                element: document.getElementById('btsCount'),
                                count: 0,
                                suffix: '',
                                color: '#4F46E5'
                            },
                            {
                                element: document.getElementById('nagariCount'),
                                count: 0,
                                suffix: '',
                                color: '#4F46E5'
                            },
                            {
                                element: document.getElementById('jorongCount'),
                                count: 0,
                                suffix: '',
                                color: '#4F46E5'
                            }
                        ];
                        initializeCounterAnimation(fallbackTargets);
                    });

                // Function to initialize counter animation
                function initializeCounterAnimation(targets) {
                    // Function to animate count-up effect with easing
                    function animateCountUp(target, duration) {
                        let startTime = null;
                        const finalCount = target.count;

                        // Easing function for smoother animation
                        function easeOutQuad(t) {
                            return t * (2 - t);
                        }

                        function step(timestamp) {
                            if (!startTime) startTime = timestamp;
                            const progress = Math.min((timestamp - startTime) / duration, 1);
                            const easedProgress = easeOutQuad(progress);
                            const currentCount = Math.floor(easedProgress * finalCount);

                            // Update counter value during animation
                            if (progress < 1) {
                                target.element.textContent = currentCount;
                                window.requestAnimationFrame(step);
                            } else {
                                // Display final count without suffix
                                target.element.textContent = finalCount;

                                // Add a subtle highlight effect when counter finishes
                                target.element.style.textShadow = '0 0 10px ' + target.color + '80';
                                setTimeout(() => {
                                    target.element.style.textShadow = 'none';
                                }, 500);
                            }
                        }

                        window.requestAnimationFrame(step);
                    }

                    // Function to check if element is in viewport with offset
                    function isInViewport(element, offset = 100) {
                        const rect = element.getBoundingClientRect();
                        return (
                            rect.top <= (window.innerHeight || document.documentElement.clientHeight) - offset &&
                            rect.bottom >= offset &&
                            rect.left <= (window.innerWidth || document.documentElement.clientWidth) - offset &&
                            rect.right >= offset
                        );
                    }

                    // Start animation when stats section comes into view
                    let animated = false;

                    function checkAndAnimate() {
                        const statsSection = document.getElementById('stats-section');
                        if (!animated && isInViewport(statsSection)) {
                            // Stagger the animations slightly for visual interest
                            targets.forEach((target, index) => {
                                setTimeout(() => {
                                    animateCountUp(target, 2000 + (index *
                                        200)); // Slightly longer duration for larger numbers
                                }, index * 150);
                            });
                            animated = true;
                            // Remove scroll listener once animation has started
                            window.removeEventListener('scroll', checkAndAnimate);
                        }
                    }

                    // Check on initial load and on scroll
                    checkAndAnimate();
                    window.addEventListener('scroll', checkAndAnimate);

                    // Reset animation if user refreshes while already scrolled to stats section
                    if (isInViewport(document.getElementById('stats-section'))) {
                        setTimeout(checkAndAnimate, 500); // Small delay to ensure DOM is ready
                    }
                }
            });
        </script>



        <!-- Background Effects Styles and Script -->
        <style>
            /* Prevent horizontal scroll */
            html,
            body {
                max-width: 100%;
                overflow-x: hidden;
                position: relative;
            }

            /* Ensure all sections don't exceed viewport width */
            section {
                width: 100%;
                overflow: hidden;
                position: relative;
            }

            /* Floating navigation adjustments */
            #floating-nav {
                display: none;
                /* Hide by default */
            }

            @media (min-width: 640px) {
                #floating-nav {
                    display: block;
                    /* Show on sm screens and up */
                }
            }

            /* Stars for dark mode */
            .star {
                position: absolute;
                background: white;
                border-radius: 50%;
                animation: twinkle 2s infinite alternate;
            }

            @keyframes twinkle {
                0% {
                    opacity: 0.3;
                    transform: scale(1);
                }

                100% {
                    opacity: 1;
                    transform: scale(1.2);
                }
            }

            /* Realistic crescent moon */
            .crescent-moon {
                position: absolute;
                top: 20px;
                right: 50px;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background:
                    radial-gradient(circle at 30% 30%, #f8f9fa 0%, #e9ecef 70%, #d1d5db 100%);
                box-shadow:
                    0 0 30px rgba(200, 230, 255, 0.8),
                    0 0 60px rgba(173, 216, 230, 0.4);
                z-index: 10;
                overflow: hidden;
                transform: rotate(-20deg);
            }

            .crescent-moon::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 120%;
                height: 100%;
                background: #0f172a;
                border-radius: 50%;
                transform: translateX(40%);
                box-shadow:
                    inset 5px 0 8px rgba(0, 0, 0, 0.3);
            }

            @keyframes crescentMoonGlow {
                0% {
                    transform: scale(1);
                    box-shadow: 0 0 20px rgba(248, 249, 250, 0.6), inset -5px -5px 10px rgba(0, 0, 0, 0.1);
                }

                100% {
                    transform: scale(1.05);
                    box-shadow: 0 0 30px rgba(248, 249, 250, 0.8), inset -5px -5px 10px rgba(0, 0, 0, 0.1);
                }
            }

            /* Sun for light mode */
            .sun {
                position: absolute;
                top: 20px;
                right: 50px;
                width: 60px;
                height: 60px;
                background: radial-gradient(circle, #ffd700 30%, #ffed4e 70%);
                border-radius: 50%;
                animation: sunGlow 3s ease-in-out infinite alternate;
                box-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
            }

            .sun::before {
                content: '';
                position: absolute;
                top: -10px;
                left: -10px;
                right: -10px;
                bottom: -10px;
                background: radial-gradient(circle, transparent 60%, rgba(255, 215, 0, 0.2) 70%);
                border-radius: 50%;
                animation: sunRays 4s linear infinite;
            }

            @keyframes sunGlow {
                0% {
                    transform: scale(1);
                    box-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
                }

                100% {
                    transform: scale(1.1);
                    box-shadow: 0 0 30px rgba(255, 215, 0, 0.8);
                }
            }

            @keyframes sunRays {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            /* Realistic clouds for light mode */
            .cloud-formation {
                position: absolute;
                top: 15%;
                left: -200px;
                width: 100vw;
                height: 200px;
                animation: cloudDrift 60s linear infinite;
                opacity: 0.7;
            }

            .cloud {
                position: absolute;
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 30%, #e9ecef 70%, #dee2e6 100%);
                border-radius: 100px;
                filter: blur(1px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .cloud::before,
            .cloud::after {
                content: '';
                position: absolute;
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 50%, #e9ecef 100%);
                border-radius: 100px;
                filter: blur(0.5px);
            }

            .cloud-1 {
                width: 120px;
                height: 60px;
                top: 20px;
                left: 50px;
            }

            .cloud-1::before {
                width: 80px;
                height: 80px;
                top: -30px;
                left: 20px;
            }

            .cloud-1::after {
                width: 100px;
                height: 70px;
                top: -25px;
                right: 15px;
            }

            .cloud-2 {
                width: 150px;
                height: 70px;
                top: 40px;
                left: 200px;
            }

            .cloud-2::before {
                width: 90px;
                height: 90px;
                top: -35px;
                left: 30px;
            }

            .cloud-2::after {
                width: 110px;
                height: 80px;
                top: -30px;
                right: 20px;
            }

            .cloud-3 {
                width: 100px;
                height: 50px;
                top: 80px;
                left: 400px;
            }

            .cloud-3::before {
                width: 70px;
                height: 70px;
                top: -25px;
                left: 15px;
            }

            .cloud-3::after {
                width: 85px;
                height: 60px;
                top: -20px;
                right: 10px;
            }

            .cloud-4 {
                width: 130px;
                height: 65px;
                top: 10px;
                left: 550px;
            }

            .cloud-4::before {
                width: 85px;
                height: 85px;
                top: -32px;
                left: 25px;
            }

            .cloud-4::after {
                width: 95px;
                height: 75px;
                top: -28px;
                right: 18px;
            }

            .cloud-5 {
                width: 110px;
                height: 55px;
                top: 60px;
                left: 720px;
            }

            .cloud-5::before {
                width: 75px;
                height: 75px;
                top: -28px;
                left: 18px;
            }

            .cloud-5::after {
                width: 90px;
                height: 65px;
                top: -23px;
                right: 12px;
            }

            @keyframes cloudDrift {
                0% {
                    transform: translateX(-200px);
                }

                100% {
                    transform: translateX(calc(100vw + 200px));
                }
            }

            /* Hide effects based on theme */
            .dark .sun,
            .dark .cloud-formation {
                display: none;
            }

            html:not(.dark) .star,
            html:not(.dark) .crescent-moon {
                display: none;
            }

            /* Floating Navigation Styles */
            #floating-nav {
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }

            #floating-nav button {
                position: relative;
                overflow: hidden;
            }

            #floating-nav button::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: rgba(59, 130, 246, 0.3);
                border-radius: 50%;
                transform: translate(-50%, -50%);
                transition: width 0.3s ease, height 0.3s ease;
            }

            #floating-nav button:hover::before {
                width: 100%;
                height: 100%;
            }

            /* Smooth scroll for all browsers */
            html {
                scroll-behavior: smooth;
            }

            /* Custom scrollbar for webkit browsers */
            ::-webkit-scrollbar {
                width: 8px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            ::-webkit-scrollbar-thumb {
                background: #c1c1c1;
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #a8a8a8;
            }

            .dark ::-webkit-scrollbar-track {
                background: #374151;
            }

            .dark ::-webkit-scrollbar-thumb {
                background: #6b7280;
            }

            .dark ::-webkit-scrollbar-thumb:hover {
                background: #9ca3af;
            }

            /* Scroll to top button styles */
            #scroll-top-btn {
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                transform: translateY(20px);
            }

            #scroll-top-btn:hover {
                transform: translateY(0) scale(1.1);
                box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
            }

            #scroll-top-btn:active {
                transform: translateY(0) scale(0.95);
            }

            /* Add pulse animation for scroll indicators */
            @keyframes pulse {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0.5;
                }
            }

            .pulse {
                animation: pulse 2s infinite;
            }

            /* Responsive adjustments for floating navigation */
            @media (max-width: 768px) {
                #floating-nav {
                    right: 1rem;
                    transform: translateY(-50%) scale(0.9);
                }

                #scroll-top-btn {
                    bottom: 1rem;
                    right: 1rem;
                    width: 3rem;
                    height: 3rem;
                }

                #floating-nav button {
                    width: 2.25rem;
                    height: 2.25rem;
                }

                #floating-nav button i {
                    font-size: 0.75rem;
                }
            }

            /* Smooth entrance animation for floating elements */
            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(100%);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(100%);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Enhanced Button Hover Effects */

            /* Primary Button (Laporkan Sekarang) Enhanced Hover */
            .btn-primary-enhanced {
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
                box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
                z-index: 1;
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            }

            .btn-primary-enhanced::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
                transition: 0.5s;
                z-index: -1;
            }

            .btn-primary-enhanced:hover {
                transform: translateY(-2px);
                box-shadow: 0 7px 14px rgba(37, 99, 235, 0.3);
                color: white !important;
            }

            .btn-primary-enhanced:hover::before {
                left: 100%;
            }

            .btn-primary-enhanced:active {
                transform: translateY(0);
                box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
            }

            /* Feature Card Button Enhanced Hover */
            .btn-feature-enhanced {
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .btn-feature-enhanced::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
                transition: all 0.4s ease;
                transform: translate(-50%, -50%);
                border-radius: 50%;
            }

            .btn-feature-enhanced:hover::after {
                width: 300px;
                height: 300px;
            }

            .btn-feature-enhanced:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
                background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            }

            .btn-feature-enhanced:hover i {
                transform: translateX(3px);
                transition: transform 0.3s ease;
            }

            /* Floating Navigation Button Enhanced Hover */
            .btn-nav-enhanced {
                position: relative;
                transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .btn-nav-enhanced::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: rgba(59, 130, 246, 0.2);
                border-radius: 50%;
                transform: translate(-50%, -50%);
                transition: all 0.4s ease;
                z-index: -1;
            }

            .btn-nav-enhanced:hover::before {
                width: 120%;
                height: 120%;
            }

            .btn-nav-enhanced:hover {
                transform: scale(1.15) rotate(5deg);
                box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
            }

            .btn-nav-enhanced:active {
                transform: scale(1.05) rotate(2deg);
            }

            /* Scroll to Top Button Enhanced Hover */
            .btn-scroll-enhanced {
                transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                position: relative;
            }

            .btn-scroll-enhanced::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.2) 50%, transparent 70%);
                transform: translateX(-100%) rotate(45deg);
                transition: transform 0.6s ease;
            }

            .btn-scroll-enhanced:hover::before {
                transform: translateX(100%) rotate(45deg);
            }

            .btn-scroll-enhanced:hover {
                transform: translateY(-5px) scale(1.1);
                box-shadow: 0 10px 30px rgba(59, 130, 246, 0.5);
                background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            }

            .btn-scroll-enhanced:hover i {
                animation: bounceUp 0.6s ease infinite alternate;
            }

            @keyframes bounceUp {
                0% {
                    transform: translateY(0);
                }

                100% {
                    transform: translateY(-3px);
                }
            }

            /* Search Button Enhanced Hover */
            .btn-search-enhanced {
                transition: all 0.3s ease;
            }

            .btn-search-enhanced:hover {
                transform: scale(1.1);
                color: #1d4ed8 !important;
            }

            .btn-search-enhanced:hover i {
                animation: searchPulse 0.8s ease infinite;
            }

            @keyframes searchPulse {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.2);
                }
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const backgroundEffects = document.getElementById('background-effects');

                function createStarsAndCrescentMoon() {
                    // Clear existing effects
                    backgroundEffects.innerHTML = '';

                    // Create crescent moon for dark mode
                    const crescentMoon = document.createElement('div');
                    crescentMoon.className = 'crescent-moon';
                    backgroundEffects.appendChild(crescentMoon);

                    // Create stars for dark mode
                    for (let i = 0; i < 50; i++) {
                        const star = document.createElement('div');
                        star.className = 'star';
                        star.style.left = Math.random() * 100 + '%';
                        star.style.top = Math.random() * 100 + '%';
                        star.style.width = Math.random() * 3 + 1 + 'px';
                        star.style.height = star.style.width;
                        star.style.animationDelay = Math.random() * 2 + 's';
                        star.style.animationDuration = (Math.random() * 3 + 2) + 's';
                        backgroundEffects.appendChild(star);
                    }
                }

                function createSunAndClouds() {
                    // Clear existing effects
                    backgroundEffects.innerHTML = '';

                    // Create sun
                    const sun = document.createElement('div');
                    sun.className = 'sun';
                    backgroundEffects.appendChild(sun);

                    // Create cloud formation
                    const cloudFormation = document.createElement('div');
                    cloudFormation.className = 'cloud-formation';

                    // Create individual clouds within the formation
                    for (let i = 1; i <= 5; i++) {
                        const cloud = document.createElement('div');
                        cloud.className = `cloud cloud-${i}`;
                        cloudFormation.appendChild(cloud);
                    }

                    backgroundEffects.appendChild(cloudFormation);
                }

                function updateBackgroundEffects() {
                    const isDark = document.documentElement.classList.contains('dark');
                    if (isDark) {
                        createStarsAndCrescentMoon();
                    } else {
                        createSunAndClouds();
                    }
                }

                // Initial setup
                updateBackgroundEffects();

                // Watch for theme changes
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                            updateBackgroundEffects();
                        }
                    });
                });

                observer.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            });



            // Search Function
            function searchLaporan() {
                const searchTerm = document.getElementById('heroSearch').value.trim();
                if (searchTerm) {
                    // Redirect to list-laporan page with search parameter
                    window.location.href = '/list-laporan?search=' + encodeURIComponent(searchTerm);
                } else {
                    // If no search term, just go to list-laporan page
                    window.location.href = '/list-laporan';
                }
            }

            // Add Enter key support for search
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('heroSearch');
                if (searchInput) {
                    searchInput.addEventListener('keypress', function(e) {
                        if (e.key === 'Enter') {
                            searchLaporan();
                        }
                    });
                }
            });
        </script>
</x-layouts.app>
