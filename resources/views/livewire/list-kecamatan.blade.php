<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex justify-center mb-6">
                <div
                    class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                    <i class="fas fa-map-marked-alt mr-2"></i>
                    <h2 class="text-xl font-bold">DATA KECAMATAN</h2>
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $kecamatans->total() }}</span>
                </div>
            </div>

            <!-- Search Section -->
            <div class="mb-6 flex flex-wrap gap-3 items-center max-w-4xl mx-auto">
                <div class="flex-1 min-w-64 relative">
                    <input type="text" wire:model.live="search" placeholder="Cari kecamatan..."
                        class="w-full pl-10 pr-8 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    @if ($search)
                        <button type="button" wire:click="$set('search', '')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Skeleton Loading Section -->
            <section class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg max-w-4xl mx-auto"
                wire:loading.flex>
                <div class="w-full p-6 relative">
                    <!-- Spinner Centered in Table -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center z-20 pointer-events-none">
                        <svg class="animate-spin h-10 w-10 text-blue-600 dark:text-blue-400 mb-2"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                        <span class="text-sm text-blue-600 dark:text-blue-400">Memuat data...</span>
                    </div>
                    <!-- Skeleton Header -->
                    <div class="flex justify-center mb-6">
                        <div class="h-10 bg-gray-200 dark:bg-gray-700 rounded-lg w-48 animate-pulse"></div>
                    </div>

                    <!-- Skeleton Search -->
                    <div class="mb-6 flex justify-center">
                        <div class="h-10 bg-gray-200 dark:bg-gray-700 rounded-md w-64 animate-pulse"></div>
                    </div>

                    <!-- Skeleton Table -->
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-lg">
                        <!-- Table Header -->
                        <div class="grid grid-cols-6 gap-4 bg-gray-100 dark:bg-gray-700 p-4">
                            @foreach (['No', 'Kecamatan', 'Nagari', 'Jorong', 'Penduduk', 'Aksi'] as $header)
                                <div class="h-5 bg-gray-200 dark:bg-gray-600 rounded animate-pulse"></div>
                            @endforeach
                        </div>

                        <!-- Table Rows -->
                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            @for ($i = 0; $i < 5; $i++)
                                <div class="grid grid-cols-6 gap-4 p-4 items-center">
                                    @foreach (range(1, 6) as $col)
                                        <div>
                                            <div class="h-4 bg-gray-100 dark:bg-gray-800 rounded animate-pulse"></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endfor
                        </div>

                        <!-- Skeleton Pagination -->
                        <div
                            class="flex justify-between items-center p-4 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                            <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32 animate-pulse"></div>
                            <div class="flex space-x-2">
                                @foreach (range(1, 3) as $page)
                                    <div class="h-8 w-8 bg-gray-200 dark:bg-gray-700 rounded-md animate-pulse"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    <!-- Table Section -->
    <div class="overflow-x-auto max-w-4xl mx-auto" wire:loading.remove>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    <th scope="col" class="px-4 py-3 w-12">
                        <div class="flex items-center">
                            <span>No</span>
                        </div>
                    </th>
                    <th scope="col" class="px-4 py-3 w-1/4">
                        <div class="flex items-center space-x-1">
                            <span>NAMA KECAMATAN</span>
                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                    </th>
                    <th scope="col" class="px-4 py-3 text-center w-1/6">
                        <div class="flex items-center space-x-1 mx-auto">
                            <span>NAGARI</span>
                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                    </th>
                    <th scope="col" class="px-4 py-3 text-center w-1/6">
                        <div class="flex items-center space-x-1 mx-auto">
                            <span>JUMLAH JORONG</span>
                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                    </th>
                    <th scope="col" class="px-4 py-3 text-center w-1/6">
                        <div class="flex items-center space-x-1 mx-auto">
                            <span>PENDUDUK</span>
                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($kecamatans as $kecamatan)
                    <tr wire:key="kecamatan-{{ $kecamatan->id }}" x-data="{ inView: false }"
                        x-intersect="inView = true"
                        x-bind:class="{ 'opacity-0 translate-y-4': !inView, 'opacity-100 translate-y-0': inView }"
                        class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-300 transform"
                        style="transition: opacity 0.3s ease, transform 0.3s ease;">
                        <td
                            class="px-4 py-3 whitespace-nowrap text-sm text-center text-gray-500 dark:text-gray-400">
                            {{ ($kecamatans->currentPage() - 1) * $kecamatans->perPage() + $loop->iteration }}
                        </td>
                        <td
                            class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                            <a href="{{ url('/list-nagari') }}?kecamatanFilter={{ $kecamatan->id }}" wire:navigate class="text-blue-600 dark:text-blue-400 hover:underline">
                                {{ $kecamatan->nama }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                {{ $kecamatan->nagari_count }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                {{ $kecamatan->jorong_count }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center text-sm text-gray-900 dark:text-gray-100">
                            {{ number_format($kecamatan->nagari->sum('jumlah_penduduk_nagari'), 0, ',', '.') }} Jiwa
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 mb-4 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                <p class="text-lg font-medium">Belum Ada Data</p>
                                <p class="text-sm">Data kecamatan belum tersedia atau tidak ditemukan</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $kecamatans->links('vendor.livewire.custom-pagination') }}
        </div>
    </div>

    <style>
        /* Hover effects for table rows */
        tr:hover {
            transform: translateX(4px);
        }

        tr {
            transition: transform 0.2s ease-in-out;
        }

        /* Animation for lazy loading */
        .opacity-0 {
            opacity: 0;
        }

        .opacity-100 {
            opacity: 1;
        }

        .translate-y-4 {
            transform: translateY(1rem);
        }

        .translate-y-0 {
            transform: translateY(0);
        }

        .dark tr:hover {
            background-color: rgba(59, 130, 246, 0.1);
        }

        /* Smooth transitions for filter changes */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>

    <script>
        // Simple scroll to top when pagination changes
        window.addEventListener('livewire:update', function() {
            const tableSection = document.querySelector('section[wire\\:loading\\.remove]');
            if (tableSection) {
                tableSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    </script>
</div>
