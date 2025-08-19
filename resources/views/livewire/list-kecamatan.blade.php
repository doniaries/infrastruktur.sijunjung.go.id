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
                                    class="group relative block p-3 rounded-lg overflow-hidden transition-all duration-200
                                           border border-blue-200 dark:border-blue-600
                                           bg-white dark:bg-blue-800
                                           hover:bg-blue-600 dark:hover:bg-blue-700
                                           hover:shadow-md hover:-translate-y-0.5">
                                    <div class="relative">
                                        <p class="text-xs font-bold text-blue-700 dark:text-blue-100 group-hover:text-white transition-colors">
                                            Nagari
                                        </p>
                                        <p class="text-sm font-black text-blue-900 dark:text-white group-hover:text-white transition-colors">
                                            {{ $kecamatan->nagari_count }}
                                        </p>
                                    </div>
                                </a>
                                <a href="/list-jorong?kecamatanFilter={{ $kecamatan->id }}"
                                    class="group relative block p-3 rounded-lg overflow-hidden transition-all duration-200
                                           border border-green-200 dark:border-green-600
                                           bg-white dark:bg-green-800
                                           hover:bg-green-600 dark:hover:bg-green-700
                                           hover:shadow-md hover:-translate-y-0.5">
                                    <div class="relative">
                                        <p class="text-xs font-bold text-green-700 dark:text-green-100 group-hover:text-white transition-colors">
                                            Jorong
                                        </p>
                                        <p class="text-sm font-black text-green-900 dark:text-white group-hover:text-white transition-colors">
                                            {{ $kecamatan->jorong_count }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            {{-- 
                            <div class="mt-3">
                                <a href="/list-nagari?kecamatan={{ $kecamatan->id }}"
                                    class="block w-full text-center text-xs font-semibold px-2 py-1.5 rounded border border-blue-200 dark:border-blue-600 text-blue-700 dark:text-white bg-white/90 dark:bg-blue-700 hover:bg-blue-50 dark:hover:bg-blue-600 transition-all duration-200 hover:shadow-sm">
                                    Lihat Detail Kecamatan
                                </a>
                            </div> --}}
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
        .animate-pulse {
            animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }
    </style>
</div>
