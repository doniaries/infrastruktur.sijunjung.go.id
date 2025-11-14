<x-layouts.app>
    



    <!-- ==============================================
        HERO SECTION
    ================================================ -->
    <section id="hero"
        class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white py-12 sm:py-16 md:py-24 relative overflow-hidden"
        data-aos="fade-up">
        

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <!-- Hero Content -->
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
                <h1
                    class="mb-4 sm:mb-6 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                    <span class="block">Infrastruktur TI &</span>
                    <span
                        class="block text-blue-600 dark:text-yellow-400 dark:hover:text-yellow-300 transition-colors duration-200 mt-1 sm:mt-2">Laporan
                        Gangguan</span>
                </h1>

                <p
                    class="mx-auto max-w-2xl text-base sm:text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8 sm:mb-10 px-3 sm:px-0">
                    Data Infrastruktur TI dan Laporan Gangguan jaringan atau konsultasi teknis dengan mudah, cepat, dan
                    akurat.
                    Sistem ini membantu Anda melacak laporan secara real-time.
                </p>

            </div>
        </div>

        <!-- Scroll Indicator -->
        {{-- <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
            <a href="#features-section"
                class="text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                <span class="sr-only">Scroll down</span>
                <svg class="h-8 w-8 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div> --}}
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



        

        



        


</x-layouts.app>
