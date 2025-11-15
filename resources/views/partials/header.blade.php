<!-- Header Section -->
<!-- Premium Professional Navigation Bar -->
<nav id="site-header" class="sticky top-0 w-full bg-white dark:bg-gray-900 shadow-md z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 transition-all duration-300">
        <div class="flex justify-between h-16 transition-all duration-300">
            <!-- Left Section - Logo/Brand -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center group">
                    <div class="bg-blue-600 group-hover:bg-blue-700 p-2 rounded-lg transition-colors duration-300">
                        <i class="fas fa-broadcast-tower text-white text-xl"></i>
                    </div>
                    <span
                        class="ml-3 text-xl font-bold text-gray-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">Infrastruktur
                        TI
                        Sijunjung</span>
                </a>
            </div>

            <!-- Center Section - Main Navigation (Desktop) -->
            <div class="hidden md:flex items-center space-x-1">
                <div class="dropdown relative">
                    <a href="{{ url('/') }}"
                        class="nav-link text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 flex items-center rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200">
                        <i class="fas fa-home mr-2"></i>
                        Beranda
                    </a>
                </div>

                <div class="dropdown relative">
                    <button
                        class="nav-link text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 flex items-center rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Wilayah
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-200"></i>
                    </button>
                    <div
                        class="dropdown-menu absolute left-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-xl py-1 z-50 opacity-0 invisible transition-all duration-300 transform -translate-y-2 border border-gray-100 dark:border-gray-700">
                        <div
                            class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Wilayah</div>
                        <a href="{{ url('/list-kecamatan') }}"
                            class="flex px-4 py-2.5 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 dark:hover:text-blue-400 items-center transition-colors duration-200">
                            <i class="fas fa-map-marked-alt text-blue-500 mr-3 w-5 text-center"></i>
                            Kecamatan
                        </a>
                        <a href="{{ url('/list-nagari') }}"
                            class="flex px-4 py-2.5 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 dark:hover:text-blue-400 items-center transition-colors duration-200">
                            <i class="fas fa-city text-blue-500 mr-3 w-5 text-center"></i>
                            Nagari
                        </a>
                        <a href="{{ url('/list-jorong') }}"
                            class="flex px-4 py-2.5 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 dark:hover:text-blue-400 items-center transition-colors duration-200">
                            <i class="fas fa-map-pin text-blue-500 mr-3 w-5 text-center"></i>
                            Jorong
                        </a>
                    </div>
                </div>

                <div class="dropdown relative">
                    <a href="{{ url('/list-laporan') }}"
                        class="nav-link text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 flex items-center rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        Daftar Laporan
                    </a>
                </div>

                <div class="dropdown relative">
                    <button
                        class="nav-link text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 flex items-center rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200">
                        <i class="fas fa-database mr-2"></i>
                        Data Infrastruktur
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-200"></i>
                    </button>
                    <div
                        class="dropdown-menu absolute left-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-xl py-1 z-50 opacity-0 invisible transition-all duration-300 transform -translate-y-2 border border-gray-100 dark:border-gray-700">
                        <div
                            class="px-4 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Data Infrastruktur</div>
                        <a href="{{ url('/list-opd') }}"
                            class="flex px-4 py-2.5 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 dark:hover:text-blue-400 items-center transition-colors duration-200">
                            <i class="fas fa-building text-blue-500 mr-3 w-5 text-center"></i>
                            OPD
                        </a>

                        <a href="{{ url('/list-inventaris') }}"
                            class="flex px-4 py-2.5 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 dark:hover:text-blue-400 items-center transition-colors duration-200">
                            <i class="fas fa-folder-open text-blue-500 mr-3 w-5 text-center"></i>
                            Inventaris
                        </a>
                        <a href="{{ url('/list-bts') }}"
                            class="flex px-4 py-2.5 text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-blue-900/30 hover:text-blue-600 dark:hover:text-blue-400 items-center transition-colors duration-200">
                            <i class="fas fa-broadcast-tower text-blue-500 mr-3 w-5 text-center"></i>
                            BTS
                        </a>
                    </div>
                </div>

                <div class="dropdown relative">
                    <a href="{{ url('/lapor') }}"
                        class="nav-link text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 flex items-center rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        Buat Laporan
                        <span class="ml-2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">!</span>
                    </a>
                </div>
            </div>

            <!-- Right Section - Actions -->
            <div class="flex items-center space-x-3 h-16">
                <button id="theme-toggle" type="button"
                    class="h-12 w-12 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 relative"
                    aria-label="Toggle dark mode">
                    <i class="fas fa-moon text-violet-700 block dark:hidden text-xl" id="dark-icon"></i>
                    <i class="fas fa-sun text-yellow-500 hidden dark:block text-xl" id="light-icon"></i>
                </button>

                @if (Auth::check())
                    <a href="{{ route('filament.admin.resources.lapors.index') }}"
                        class="p-2 text-gray-600 hover:text-blue-600 rounded-full hover:bg-gray-100 transition-colors duration-200 relative">
                        <i class="fas fa-bell"></i>
                        <span class="sr-only">Notifikasi</span>
                        @if (Auth::user()->unreadNotifications->count() > 0)
                            <span
                                class="absolute top-0 right-0 h-2.5 w-2.5 rounded-full bg-red-500 border-2 border-white"></span>
                        @endif
                    </a>
                @endif

                <div class="hidden md:block h-6 w-px bg-gray-200"></div>

                @if (Auth::check())
                    <div class="dropdown relative">
                        <button class="flex items-center space-x-2 focus:outline-none group">
                            <div class="relative">
                                <div
                                    class="h-9 w-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 overflow-hidden avatar-ring">
                                    @if (Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <i class="fas fa-user text-xl"></i>
                                    @endif
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>
                            <div class="hidden lg:flex flex-col items-start">
                                <span
                                    class="text-sm font-medium text-gray-700 group-hover:text-blue-600 transition-colors duration-200">{{ Auth::user()->name }}</span>
                                <span class="text-xs text-gray-500">{{ Auth::user()->roles[0]->name ?? 'User' }}</span>
                            </div>
                            <i
                                class="fas fa-chevron-down text-xs text-gray-500 hidden lg:inline transition-transform duration-200 group-hover:text-blue-600"></i>
                        </button>
                        <div
                            class="dropdown-menu absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl py-1 z-50 opacity-0 invisible transition-all duration-300 transform -translate-y-2 border border-gray-100">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="flex items-center">
                                    <div
                                        class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 overflow-hidden mr-3">
                                        @if (Auth::user()->avatar)
                                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                                class="h-full w-full object-cover">
                                        @else
                                            <i class="fas fa-user text-xl"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('filament.admin.pages.dashboard') }}"
                                class="flex px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 items-center transition-colors duration-200">
                                <i class="fas fa-tachometer-alt text-gray-400 mr-3 w-5 text-center"></i>
                                Dashboard
                            </a>
                            <a href="{{ route('filament.admin.resources.users.edit', ['record' => Auth::id()]) }}"
                                class="px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 flex items-center transition-colors duration-200">
                                <i class="fas fa-user-circle text-gray-400 mr-3 w-5 text-center"></i>
                                Profil Saya
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 flex items-center transition-colors duration-200">
                                    <i class="fas fa-sign-out-alt text-gray-400 mr-3 w-5 text-center"></i>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="hidden md:inline">Masuk</span>
                    </a>
                @endif

                <!-- Toggle mobile menu tanpa JS: gunakan checkbox + peer -->
                <label for="mobile-menu-toggle"
                    class="md:hidden p-2 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-gray-100 transition-colors duration-200 cursor-pointer">
                    <i class="fas fa-bars text-xl"></i>
                    <span class="sr-only">Menu</span>
                </label>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <!-- Checkbox sebagai peer untuk kontrol visibilitas menu -->
    <input type="checkbox" id="mobile-menu-toggle" class="peer hidden" />
    <div id="mobile-menu"
        class="hidden peer-checked:block md:hidden bg-white border-t border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="px-2 pt-2 pb-4 space-y-1">
            <a href="{{ url('/') }}"
                class="px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                <i class="fas fa-home text-blue-500 mr-3 w-5 text-center"></i>
                Beranda
            </a>

            <!-- Submenu Wilayah menggunakan details/summary agar tanpa JS -->
            <details class="group">
                <summary
                    class="w-full flex justify-between items-center px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200 cursor-pointer list-none">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-3 w-5 text-center"></i>
                        Wilayah
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-open:rotate-180"></i>
                </summary>
                <div class="pl-4 mt-1 space-y-1">
                    <a href="{{ url('/list-kecamatan') }}"
                        class="px-4 py-2 rounded-lg text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-map-marked-alt text-blue-400 mr-3 w-5 text-center"></i>
                        Kecamatan
                    </a>
                    <a href="{{ url('/list-nagari') }}"
                        class="px-4 py-2 rounded-lg text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-city text-blue-400 mr-3 w-5 text-center"></i>
                        Nagari
                    </a>
                    <a href="{{ url('/list-jorong') }}"
                        class="px-4 py-2 rounded-lg text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-map-pin text-blue-400 mr-3 w-5 text-center"></i>
                        Jorong
                    </a>
                </div>
            </details>
            <a href="{{ url('/list-laporan') }}"
                class="px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                <i class="fas fa-clipboard-list text-blue-500 mr-3 w-5 text-center"></i>
                Daftar Laporan
            </a>
            <a href="{{ url('/lapor') }}"
                class="px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                <i class="fas fa-exclamation-circle text-blue-500 mr-3 w-5 text-center"></i>
                Buat Laporan
                <span class="ml-2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">!</span>
            </a>
            <details class="group">
                <summary
                    class="w-full flex justify-between items-center px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200 cursor-pointer list-none">
                    <div class="flex items-center">
                        <i class="fas fa-database text-blue-500 mr-3 w-5 text-center"></i>
                        Data Infrastruktur
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-open:rotate-180"></i>
                </summary>
                <div class="pl-4 mt-1 space-y-1">
                    <a href="{{ url('/list-opd') }}"
                        class="px-4 py-2 rounded-lg text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-building text-blue-400 mr-3 w-5 text-center"></i>
                        OPD
                    </a>
                    <a href="{{ url('/list-peralatan') }}"
                        class="px-4 py-2 rounded-lg text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-cube text-blue-400 mr-3 w-5 text-center"></i>
                        Peralatan
                    </a>
                    <a href="{{ url('/list-inventaris') }}"
                        class="px-4 py-2 rounded-lg text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-folder-open text-blue-400 mr-3 w-5 text-center"></i>
                        Inventaris
                    </a>
                    <a href="{{ url('/list-bts') }}"
                        class="px-4 py-2 rounded-lg text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-broadcast-tower text-blue-400 mr-3 w-5 text-center"></i>
                        BTS
                    </a>
                </div>
            </details>
            <div class="border-t border-gray-200 dark:border-gray-700 pt-2 mt-2">
                @if (Auth::check())
                    <a href="{{ route('filament.admin.pages.dashboard') }}"
                        class="px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-tachometer-alt text-blue-500 mr-3 w-5 text-center"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('filament.admin.resources.users.edit', ['record' => Auth::id()]) }}"
                        class="px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-user-circle text-blue-500 mr-3 w-5 text-center"></i>
                        Profil Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                            <i class="fas fa-sign-out-alt text-blue-500 mr-3 w-5 text-center"></i>
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-3 rounded-lg text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 flex items-center transition-colors duration-200">
                        <i class="fas fa-sign-in-alt text-blue-500 mr-3 w-5 text-center"></i>
                        Masuk
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- JavaScript for enhanced functionality is now in app.js -->
<!-- End of Header Section -->
