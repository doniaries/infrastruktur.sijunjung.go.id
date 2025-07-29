<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex justify-center mb-6">
                <div
                    class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                    <h2 class="text-xl font-bold">Data Nagari</h2>
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $totalData }}</span>
                </div>
            </div>

            <!-- Search, Filter and Export Section -->
            <div class="mb-6 flex flex-wrap gap-3 items-center max-w-4xl mx-auto">
                <div class="flex-1 min-w-64">
                    <input type="text" wire:model.live="search" placeholder="Cari nagari..."
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
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
                <button wire:click="exportPdf"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200 min-w-fit btn-export-enhanced ripple glow-on-hover">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Export PDF
                </button>
            </div>

            <!-- Skeleton Loading Section -->
            <section
                class="bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-4xl mx-auto"
                wire:loading>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('nama_nagari')"
                                        class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Nama Nagari</span>
                                        @if ($sortField === 'nama_nagari')
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
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
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
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('nama_wali_nagari')"
                                        class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Wali Nagari</span>
                                        @if ($sortField === 'nama_wali_nagari')
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
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3 text-right">
                                    <button wire:click="sortBy('jumlah_penduduk')"
                                        class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400 ml-auto">
                                        <span>Penduduk</span>
                                        @if ($sortField === 'jumlah_penduduk')
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
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3 text-right">
                                    <button wire:click="sortBy('luas_nagari')"
                                        class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400 ml-auto">
                                        <span>Luas (Ha)</span>
                                        @if ($sortField === 'luas_nagari')
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
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3 text-center">
                                    <button wire:click="sortBy('jorongs_count')"
                                        class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400 mx-auto">
                                        <span>Jorong</span>
                                        @if ($sortField === 'jorongs_count')
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
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                                <tr class="animate-pulse">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32"></div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-24"></div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-36"></div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-20"></div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-16"></div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-12"></div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </section>


            <!-- Table Section -->
            <section
                class="bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-4xl mx-auto"
                wire:loading.remove>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <div class="flex items-center space-x-1">
                                        <span>Nama Nagari</span>
                                        <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <div class="flex items-center space-x-1">
                                        <span>Kecamatan</span>
                                        <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <div class="flex items-center space-x-1">
                                        <span>Wali Nagari</span>
                                        <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3 text-right">
                                    <div class="flex items-center space-x-1 ml-auto">
                                        <span>Penduduk</span>
                                        <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3 text-right">
                                    <div class="flex items-center space-x-1 ml-auto">
                                        <span>Luas (Ha)</span>
                                        <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3 text-center">
                                    <div class="flex items-center space-x-1 mx-auto">
                                        <span>Jorong</span>
                                        <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($nagaris as $nagari)
                                <tr class="border-b dark:border-gray-700">
                                    <td
                                        class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $nagari->nama_nagari }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            {{ $nagari->kecamatan ? $nagari->kecamatan->nama : '-' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $nagari->nama_wali_nagari }}</td>
                                    <td class="px-4 py-3 text-sm text-right text-gray-900 dark:text-gray-100">
                                        {{ number_format($nagari->jumlah_penduduk_nagari ?? 0, 0, ',', '.') }} Jiwa</td>
                                    <td class="px-4 py-3 text-sm text-right text-gray-900 dark:text-gray-100">
                                        {{ number_format($nagari->luas_nagari ?? 0, 0, ',', '.') }} Ha</td>
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            {{ $nagari->jumlah_jorong }} Jorong
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 mb-4 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                            <p class="text-lg font-medium">Belum Ada Data</p>
                                            <p class="text-sm">Data nagari belum tersedia atau tidak ditemukan</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div
                    class="mt-6 bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-4xl mx-auto">
                    {{ $nagaris->links('vendor.livewire.custom-pagination') }}
                </div>
        </div>
    </div>
</div>
