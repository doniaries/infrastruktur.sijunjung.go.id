<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
    <!-- Title Section -->
    <div class="flex justify-center mb-6">
        <div
            class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
            <h2 class="text-xl font-bold">Data Kecamatan</h2>
            <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $kecamatans->total() }}</span>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="mb-6 max-w-2xl mx-auto">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari kecamatan..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
    </div>

    <!-- Loading State -->
    <div wire:loading.flex class="justify-center w-full">
        <div class="w-full animate-pulse">
            <div class="grid grid-cols-3 gap-4">
                @for ($i = 0; $i < 6; $i++)
                    <div
                        class="bg-gray-200 dark:bg-slate-900 rounded-lg p-3 h-32 border border-blue-100 dark:border-blue-800">
                        <div class="h-3.5 bg-gray-300 dark:bg-gray-600 rounded w-3/4 mb-2"></div>
                        <div class="grid grid-cols-2 gap-2 mt-3">
                            <div class="h-8 bg-gray-200 dark:bg-green-600 rounded-sm text-color-gray-600"></div>
                            <div class="h-8 bg-gray-200 dark:bg-green-600 rounded-sm text-color-gray-600"></div>
                        </div>
                        <div class="h-7 mt-2 bg-gray-200 dark:bg-gray-600 rounded-sm"></div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Content -->
    <div wire:loading.remove>
        @if ($kecamatans->count() > 0)
            <div class="grid grid-cols-3 gap-4">
                @foreach ($kecamatans as $kecamatan)
                    <div x-data="{ inView: false }" x-intersect="inView = true"
                        x-bind:class="{ 'opacity-0 translate-y-4': !inView, 'opacity-100 translate-y-0': inView }"
                        class="bg-white dark:bg-slate-900 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-blue-100 dark:border-blue-800 overflow-hidden hover:-translate-y-1">
                        <div class="p-3">
                            <div class="flex items-center mb-2">
                                <div
                                    class="flex items-center space-x-2 bg-white/70 dark:bg-blue-900/40 px-3 py-2 rounded-md w-full backdrop-blur-sm">
                                    <div
                                        class="p-1.5 rounded-md bg-white/80 dark:bg-blue-800/60 text-blue-600 dark:text-blue-100 shadow-sm flex-shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-bold text-blue-800 dark:text-blue-100 truncate"
                                        title="{{ $kecamatan->nama }}">
                                        {{ $kecamatan->nama }}
                                    </h3>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2 mt-3">
                                <a href="/list-nagari?kecamatanFilter={{ $kecamatan->id }}" 
                                   class="nagari-card card-base">
                                    <p class="text-xs font-bold">Nagari</p>
                                    <p class="text-sm font-black">
                                        {{ $kecamatan->nagari_count }}
                                    </p>
                                </a>
                                <a href="/list-jorong?kecamatanFilter={{ $kecamatan->id }}"
                                   class="jorong-card card-base">
                                    <p class="text-xs font-bold">Jorong</p>
                                    <p class="text-sm font-black">
                                        {{ $kecamatan->jorong_count }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $kecamatans->links('vendor.livewire.custom-pagination') }}
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-gray-100">Tidak ada data kecamatan</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Tidak ditemukan kecamatan yang sesuai dengan
                    pencarian Anda.</p>
            </div>
        @endif
    </div>

    <style>
        /* Animations */
        .animate-pulse {
            animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: .5;
            }
        }

        /* Custom Card Styles */
        .kecamatan-container {
            --card-bg: #ffffff;
            --card-border: #e5e7eb;
            --card-text: #1f2937;
            --card-hover-bg: #f9fafb;
            --card-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --card-hover-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --card-glow: 0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .dark .kecamatan-container {
            --card-bg: theme('colors.gray.800');
            --card-border: theme('colors.gray.700');
            --card-text: theme('colors.gray.200');
            --card-hover-bg: theme('colors.gray.700');
        }

        /* Nagari Card */
        .nagari-card {
            --card-bg: #1d4ed8; /* blue-700 */
            --card-border: #2563eb; /* blue-600 */
            --card-text: #ffffff;
            --card-hover-bg: #1e40af; /* blue-800 */
            --card-hover-text: #ffffff;
            --card-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2393c5fd'%3E%3Cpath d='M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z' /%3E%3Cpath d='M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z' /%3E%3C/svg%3E");
        }

        .dark .nagari-card {
            --card-bg: #1d4ed8; /* blue-700 */
            --card-border: #2563eb; /* blue-600 */
            --card-text: #ffffff;
            --card-hover-bg: #1e40af; /* blue-800 */
            --card-hover-text: #ffffff;
        }

        /* Jorong Card */
        .jorong-card {
            --card-bg: #15803d; /* green-700 */
            --card-border: #16a34a; /* green-600 */
            --card-text: #ffffff;
            --card-hover-bg: #166534; /* green-800 */
            --card-hover-text: #ffffff;
            --card-icon: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2386efac'%3E%3Cpath fill-rule='evenodd' d='M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9a3 3 0 016 0v6a3 3 0 01-3 3h-1.5v.75a3 3 0 01-3 3h-6a3 3 0 01-3-3v-1.5H3a3 3 0 01-3-3V9a3 3 0 013-3h12.75z' clip-rule='evenodd' /%3E%3C/svg%3E");
        }

        .dark .jorong-card {
            --card-bg: #15803d; /* green-700 */
            --card-border: #16a34a; /* green-600 */
            --card-text: #ffffff;
            --card-hover-bg: #166534; /* green-800 */
            --card-hover-text: #ffffff;
        }

        /* Apply Styles */
        .card-base {
            position: relative;
            border-radius: 0.75rem;
            border: 1px solid var(--card-border);
            background-color: var(--card-bg);
            color: var(--card-text);
            box-shadow: var(--card-shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            padding: 1.25rem;
        }

        .nagari-card::before,
        .jorong-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 4rem;
            height: 4rem;
            background-image: var(--card-icon);
            background-size: 2.5rem;
            background-position: top right;
            background-repeat: no-repeat;
            opacity: 0.2;
            pointer-events: none;
        }

        .card-base:hover {
            background-color: var(--card-hover-bg);
            color: var(--card-hover-text, var(--card-text));
            box-shadow: var(--card-hover-shadow);
            transform: translateY(-0.25rem);
        }

        .card-base p:first-child {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .card-base p:last-child {
            font-size: 1.25rem;
            font-weight: 800;
            line-height: 1.2;
        }
    </style>
</div>
