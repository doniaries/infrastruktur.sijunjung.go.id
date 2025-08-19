<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Title Section -->
                <div class="flex justify-center mb-6">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold">Data Jorong</h2>
                        <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $totalData }}</span>
                    </div>
                </div>

                <!-- Search, Filter and Export Section -->
                <div class="mb-6 flex flex-wrap gap-3 items-center max-w-6xl mx-auto">
                    <div class="min-w-64 max-w-80 relative">
                        <input type="text" wire:model.live="search" placeholder="Cari jorong..."
                            class="w-full pl-10 pr-8 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        @if($search)
                            <button type="button" wire:click="$set('search', '')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @endif
                    </div>
                    <div class="min-w-48">
                        <select wire:model.live="kecamatanFilter"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Semua Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="min-w-48">
                        <select wire:model.live="nagariFilter"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Semua Nagari</option>
                            @foreach ($nagaris as $nagari)
                                <option value="{{ $nagari->id }}">{{ $nagari->nama_nagari }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="min-w-fit">
                        <button wire:click="exportPdf"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 hover:shadow-lg hover:scale-105 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform w-full h-[42px] btn-export-enhanced ripple glow-on-hover">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Export PDF
                        </button>
                    </div>
                </div>

                <!-- Skeleton Loading -->
                <div wire:loading.flex class="flex justify-center w-full">
                    <section
                        class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden w-full max-w-6xl animate-pulse">
                        <!-- Spinner Centered in Table -->
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center z-20 pointer-events-none">
                            <svg class="animate-spin h-10 w-10 text-blue-600 dark:text-blue-400 mb-2"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                </path>
                            </svg>
                            <span class="text-sm text-blue-600 dark:text-blue-400">Memuat data...</span>
                        </div>
                        <!-- Skeleton Header -->
                        <div class="p-6">
                            <div class="h-8 bg-gray-200 dark:bg-gray-700 rounded w-48 mb-6"></div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                                <div class="h-10 bg-gray-200 dark:bg-gray-700 rounded"></div>
                                <div class="h-10 bg-gray-200 dark:bg-gray-700 rounded"></div>
                                <div class="h-10 bg-gray-200 dark:bg-gray-700 rounded"></div>
                                <div class="h-10 bg-gray-200 dark:bg-gray-700 rounded"></div>
                            </div>
                        </div>

                        <!-- Skeleton Table -->
                        <div class="overflow-x-auto">
                            <div class="h-12 bg-gray-200 dark:bg-gray-700"></div>
                            <div class="space-y-4 p-4">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="h-16 bg-gray-100 dark:bg-gray-700 rounded"></div>
                                @endfor
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Table -->
                <div class="flex justify-center w-full" wire:loading.remove>
                    <section class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden w-full max-w-6xl">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 w-12">
                                            <span>No</span>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <button wire:click="sortBy('nama_jorong')"
                                                class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                                <span>Nama Jorong</span>
                                                @if ($sortField === 'nama_jorong')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-50" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <button wire:click="sortBy('nagari')"
                                                class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                                <span>Nagari</span>
                                                @if ($sortField === 'nagari')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-50" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <button wire:click="sortBy('kecamatan')"
                                                class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                                <span>Kecamatan</span>
                                                @if ($sortField === 'kecamatan')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-50" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            <button wire:click="sortBy('nama_kepala_jorong')"
                                                class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                                <span>Kepala Jorong</span>
                                                @if ($sortField === 'nama_kepala_jorong')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-50" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-right">
                                            <button wire:click="sortBy('jumlah_penduduk_jorong')"
                                                class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400 ml-auto">
                                                <span>Penduduk</span>
                                                @if ($sortField === 'jumlah_penduduk_jorong')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-50" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                        <th scope="col" class="px-4 py-3 text-right">
                                            <button wire:click="sortBy('luas_jorong')"
                                                class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400 ml-auto">
                                                <span>Luas (Ha)</span>
                                                @if ($sortField === 'luas_jorong')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-50" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($jorongs as $index => $jorong)
                                            <tr wire:key="jorong-{{ $jorong->id }}" x-data="{ inView: false }"
                                            x-intersect="inView = true"
                                            x-bind:class="{ 'opacity-0 translate-y-4': !inView, 'opacity-100 translate-y-0': inView }"
                                            class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-300 transform"
                                            style="transition: opacity 0.3s ease, transform 0.3s ease;">
                                            <td class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                                {{ ($jorongs->currentPage() - 1) * $jorongs->perPage() + $loop->iteration }}
                                            </td>
                                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $jorong->nama_jorong }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300 transition-all duration-300 hover:scale-105">
                                                    {{ $jorong->nagari ? $jorong->nagari->nama_nagari : '-' }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300 transition-all duration-300 hover:scale-105">
                                                    {{ $jorong->nagari && $jorong->nagari->kecamatan ? $jorong->nagari->kecamatan->nama : '-' }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-white">
                                                {{ $jorong->nama_kepala_jorong }}
                                            </td>
                                            <td class="px-4 py-3 text-right text-gray-900 dark:text-white">
                                                <span
                                                    class="font-medium">{{ number_format($jorong->jumlah_penduduk_jorong ?? 0, 0, ',', '.') }}</span>
                                                <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">Jiwa</span>
                                            </td>
                                            <td class="px-4 py-3 text-right text-gray-900 dark:text-white">
                                                <span
                                                    class="font-medium">{{ number_format($jorong->luas_jorong ?? 0, 0, ',', '.') }}</span>
                                                <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">Ha</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7"
                                                class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">
                                                <div class="flex flex-col items-center">
                                                    <svg class="w-12 h-12 mb-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg>
                                                    <p class="text-lg font-medium">Belum Ada Data</p>
                                                    <p class="text-sm">Data jorong belum tersedia atau tidak
                                                        ditemukan
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div
                            class="bg-gray-100 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 px-4 py-3">
                            {{ $jorongs->links('vendor.livewire.custom-pagination') }}
                        </div>
                    </section>
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
    </div>
</div>
