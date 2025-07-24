<x-layouts.app>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white py-12 relative overflow-hidden">
        <!-- Background Effects -->
        <div id="background-effects" class="absolute inset-0 pointer-events-none"></div>

        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 relative z-10">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Sistem Informasi Infrastruktur Sijunjung</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-300">
                    Laporkan gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan akurat. Sistem ini
                    membantu Anda melacak laporan secara real-time.</p>
                <div class="type-hero mb-6 text-2xl font-bold text-primary-700 dark:text-blue-300">
                    <span class="tw-typewriter-hero"></span>
                </div>
                <a href="#lapor"
                    class="inline-flex items-center justify-center px-6 py-3 mr-3 text-base font-medium text-center text-white rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 backdrop-blur-md border border-white/20 shadow-lg hover:shadow-xl hover:scale-105 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-700 hover:backdrop-blur-lg hover:border-white/30 transition-all duration-300 ease-in-out transform dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700">
                    Lapor Sekarang
                    <i class="fas fa-arrow-right w-5 h-5 ml-2 -mr-1"></i>
                </a>
                <a href="{{ url('/list-laporan') }}"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Lihat Laporan
                </a>
            </div>
            {{-- <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('images/rumahgadang.png') }}" alt="Rumah Gadang">
            </div> --}}
        </div>
    </section>

    <!-- Features Section -->
    <section id="features-section" class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white py-16">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6 relative z-10">

            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-primary-200 dark:border-primary-900">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <i class="fas fa-file-alt text-primary-600 lg:text-xl dark:text-primary-300"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Laporan Gangguan</h3>
                    <p class="text-gray-500 dark:text-gray-300 mb-4">Laporkan gangguan jaringan dengan mudah dan cepat.
                        Sistem akan mengirimkan notifikasi kepada petugas terkait.</p>
                    <a href="{{ url('/list-laporan') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors duration-300">
                        <i class="fas fa-arrow-right mr-2"></i> Lihat Laporan
                    </a>
                </div>
                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-primary-200 dark:border-primary-900">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <i class="fas fa-broadcast-tower text-primary-600 lg:text-xl dark:text-primary-300"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Pemetaan BTS</h3>
                    <p class="text-gray-500 dark:text-gray-300 mb-4">Lihat lokasi dan informasi mengenai Base
                        Transceiver
                        Station (BTS) yang tersebar di Kabupaten Sijunjung.</p>
                    <a href="{{ url('/list-bts') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors duration-300">
                        <i class="fas fa-map-marker-alt mr-2"></i> Lihat BTS
                    </a>
                </div>
                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-primary-200 dark:border-primary-900">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <i class="fas fa-map text-primary-600 lg:text-xl dark:text-primary-300"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Data Nagari</h3>
                    <p class="text-gray-500 dark:text-gray-300 mb-4">Akses informasi tentang Nagari di Kabupaten
                        Sijunjung beserta infrastruktur yang tersedia di wilayah tersebut.</p>
                    <a href="{{ url('/list-nagari') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors duration-300">
                        <i class="fas fa-list mr-2"></i> Lihat Nagari
                    </a>
                </div>
                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-primary-200 dark:border-primary-900">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <i class="fas fa-home text-primary-600 lg:text-xl dark:text-primary-300"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Data Jorong</h3>
                    <p class="text-gray-500 dark:text-gray-300 mb-4">Akses informasi tentang Jorong di Kabupaten
                        Sijunjung beserta infrastruktur yang tersedia di wilayah tersebut.</p>
                    <a href="{{ url('/list-jorong') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors duration-300">
                        <i class="fas fa-list-alt mr-2"></i> Lihat Jorong
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- BTS Map Section -->
    <section class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white py-16">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
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
    <section id="stats-section" class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white py-16">
        <div class="py-12 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-10 lg:mb-16 text-center mx-auto">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Statistik
                    Infrastruktur</h2>
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
    </section>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- BTS Map Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta di elemen dengan id 'btsMap'
            const map = L.map('btsMap').setView([-0.6477, 101.3184], 9); // Koordinat Sijunjung dan zoom level

            // Tambahkan layer peta dasar dari OpenStreetMap
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
                                <div class="p-2">
                                    <h3 class="font-bold">${bts.pemilik || 'Tidak diketahui'}</h3>
                                    <p><strong>Alamat:</strong> ${bts.alamat || 'Tidak diketahui'}</p>
                                    <p><strong>Teknologi:</strong> ${bts.teknologi || 'Tidak diketahui'}</p>
                                    <p><strong>Status:</strong> ${bts.status || 'Tidak diketahui'}</p>
                                    <p><strong>Tahun Bangun:</strong> ${bts.tahun_bangun || 'Tidak diketahui'}</p>
                                </div>
                            `);
                        }
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

        /* Moon for dark mode */
        .moon {
            position: absolute;
            top: 20px;
            right: 50px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #dee2e6 100%);
            border-radius: 50%;
            animation: moonGlow 4s ease-in-out infinite alternate;
            box-shadow: 0 0 20px rgba(248, 249, 250, 0.6), inset -5px -5px 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .moon::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 12px;
            width: 8px;
            height: 8px;
            background: rgba(180, 180, 180, 0.8);
            border-radius: 50%;
            z-index: 11;
            box-shadow:
                15px 5px 0 -2px rgba(180, 180, 180, 0.6),
                8px 18px 0 -3px rgba(180, 180, 180, 0.5),
                20px 20px 0 -4px rgba(180, 180, 180, 0.4);
        }

        @keyframes moonGlow {
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
        html:not(.dark) .moon {
            display: none;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backgroundEffects = document.getElementById('background-effects');

            function createStarsAndMoon() {
                // Clear existing effects
                backgroundEffects.innerHTML = '';

                // Create moon for dark mode
                const moon = document.createElement('div');
                moon.className = 'moon';
                backgroundEffects.appendChild(moon);

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
                    createStarsAndMoon();
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

        // Navigation Buttons Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopButton = document.getElementById('back-to-top');
            const scrollDownButton = document.getElementById('scroll-down');
            
            function updateButtonsVisibility() {
                const scrollPosition = window.pageYOffset;
                const documentHeight = document.documentElement.scrollHeight;
                const windowHeight = window.innerHeight;
                const isAtTop = scrollPosition < 100;
                const isAtBottom = scrollPosition + windowHeight >= documentHeight - 100;
                
                // Back to Top Button
                if (backToTopButton) {
                    if (scrollPosition > 300) {
                        backToTopButton.classList.remove('opacity-0', 'pointer-events-none');
                        backToTopButton.classList.add('opacity-100');
                    } else {
                        backToTopButton.classList.add('opacity-0', 'pointer-events-none');
                        backToTopButton.classList.remove('opacity-100');
                    }
                }
                
                // Scroll Down Button
                if (scrollDownButton) {
                    if (isAtTop && !isAtBottom) {
                        scrollDownButton.classList.remove('opacity-0', 'pointer-events-none');
                        scrollDownButton.classList.add('opacity-100');
                    } else {
                        scrollDownButton.classList.add('opacity-0', 'pointer-events-none');
                        scrollDownButton.classList.remove('opacity-100');
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
            
            // Scroll Down Button Click
            if (scrollDownButton) {
                scrollDownButton.addEventListener('click', function() {
                    window.scrollTo({
                        top: document.documentElement.scrollHeight,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>

    <!-- Navigation Buttons -->
    <!-- Back to Top Button -->
    <button id="back-to-top" 
        class="fixed bottom-6 right-6 z-50 w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 pointer-events-none transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
        aria-label="Back to top">
        <i class="fas fa-chevron-up text-lg"></i>
    </button>
    
    <!-- Scroll Down Button -->
    <button id="scroll-down" 
        class="fixed bottom-6 left-6 z-50 w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 pointer-events-none transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800"
        aria-label="Scroll to bottom">
        <i class="fas fa-chevron-down text-lg"></i>
    </button>
</x-layouts.app>
