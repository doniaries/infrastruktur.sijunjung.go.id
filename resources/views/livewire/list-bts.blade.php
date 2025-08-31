<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex justify-center mb-6">
                <div
                    class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                    <h2 class="text-xl font-bold">Data BTS</h2>
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $totalData }}</span>
                </div>
            </div>

            <!-- Search, Filter and Export Section -->
            <div class="mb-6 flex flex-wrap gap-3 items-center max-w-5xl mx-auto">
                <div class="flex-1 min-w-48 relative">
                    <input type="text" wire:model.live="search" placeholder="Cari BTS..."
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
                    <select wire:model.live="operatorFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Operator</option>
                        @foreach ($operators as $operator)
                            <option value="{{ $operator->id }}">{{ $operator->nama_operator }}</option>
                        @endforeach
                    </select>
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
                    <select wire:model.live="teknologiFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Teknologi</option>
                        <option value="2G">2G</option>
                        <option value="3G">3G</option>
                        <option value="4G">4G</option>
                        <option value="4G+5G">4G+5G</option>
                        <option value="5G">5G</option>
                    </select>
                </div>
                <div class="min-w-48">
                    <select wire:model.live="statusFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Non-Aktif</option>
                    </select>
                </div>
                <button wire:click="exportPdf"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 hover:shadow-lg hover:scale-105 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform min-w-fit btn-export-enhanced ripple glow-on-hover">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Export PDF
                </button>
            </div>



            <!-- Table Section -->
            <div class="bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-6xl mx-auto">
                <div class="overflow-x-auto">

                        <!-- Skeleton Loading -->
                        <div wire:loading.flex class="flex justify-center w-full">
                            <section
                                class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden w-full max-w-6xl animate-pulse relative">
                                <!-- Spinner Centered in Table -->
                                <div
                                    class="absolute inset-0 flex flex-col items-center justify-center z-20 pointer-events-none">
                                    <svg class="animate-spin h-10 w-10 text-blue-600 dark:text-blue-400 mb-2"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
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
                        <!-- Akhir Skeleton Loading -->

                        <!-- Table -->
                        <div class="w-full" wire:loading.remove>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">Operator</th>
                                            <th scope="col" class="px-4 py-3">Kecamatan</th>
                                            <th scope="col" class="px-4 py-3">Nagari</th>
                                            <th scope="col" class="px-4 py-3">Koordinat</th>
                                            <th scope="col" class="px-4 py-3">Alamat</th>
                                            <th scope="col" class="px-4 py-3">Teknologi</th>
                                            <th scope="col" class="px-4 py-3">Status</th>
                                            <th scope="col" class="px-4 py-3">Tahun Bangun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @forelse($bts as $item)
                                                <tr class="border-b dark:border-gray-700">
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        @if ($item->operator && $item->operator->nama_operator == 'TELKOMSEL')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                                {{ $item->operator->nama_operator }}
                                                            </span>
                                                        @elseif($item->operator && $item->operator->nama_operator == 'INDOSAT')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                                                {{ $item->operator->nama_operator }}
                                                            </span>
                                                        @elseif($item->operator && $item->operator->nama_operator == 'XL AXIATA')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                                {{ $item->operator->nama_operator }}
                                                            </span>
                                                        @else
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                                                {{ $item->operator ? $item->operator->nama_operator : 'Tidak Diketahui' }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        <span
                                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                            {{ $item->kecamatan ? $item->kecamatan->nama : '-' }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        {{ $item->nagari ? $item->nagari->nama_nagari : '-' }}
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                        {{ $item->titik_koordinat }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100 max-w-xs truncate">
                                                        {{ $item->alamat }}
                                                    </td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        @if ($item->teknologi == '2G')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                                                {{ $item->teknologi }}
                                                            </span>
                                                        @elseif($item->teknologi == '3G')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                                {{ $item->teknologi }}
                                                            </span>
                                                        @elseif($item->teknologi == '4G')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                                {{ $item->teknologi }}
                                                            </span>
                                                        @elseif($item->teknologi == '4G+5G')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-cyan-100 text-cyan-800 dark:bg-cyan-900 dark:text-cyan-200">
                                                                {{ $item->teknologi }}
                                                            </span>
                                                        @elseif($item->teknologi == '5G')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                                                {{ $item->teknologi }}
                                                            </span>
                                                        @else
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                                                {{ $item->teknologi }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        @if ($item->status == 'aktif')
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        @else
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                        {{ $item->tahun_bangun }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8"
                                                        class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">
                                                        <div class="flex flex-col items-center">
                                                            <svg class="w-12 h-12 mb-4 text-gray-400" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                                                                </path>
                                                            </svg>
                                                            <p class="text-lg font-medium">Belum Ada Data</p>
                                                            <p class="text-sm">Data BTS belum tersedia atau tidak
                                                                ditemukan</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Pagination -->
                            <div class="px-4 py-3 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 sm:px-6">
                                {{ $bts->links('vendor.livewire.custom-pagination') }}
                            </div>
                        </div>
                </div>
            </div>
        </div>
