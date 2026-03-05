<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex justify-center mb-8">
                <div class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-black rounded-xl shadow-xl transform hover:scale-105 transition-all duration-300 border border-blue-800/20"
                     style="background: linear-gradient(to right, #1d4ed8, #3730a3);">
                    <i class="fas fa-city mr-3 text-xl text-white"></i>
                    <h2 class="text-2xl uppercase tracking-wider text-white">DATA NAGARI</h2>
                    <span class="ml-3 px-3 py-1 bg-white/30 backdrop-blur-sm rounded-full text-sm border border-white/40 text-white font-black">{{ $totalData }}</span>
                </div>
            </div>

            <!-- DataTables Header Controls -->
            <div class="mb-6 flex flex-col lg:flex-row justify-between items-center gap-4 bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="flex flex-wrap items-center gap-4 w-full lg:w-auto">
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-900 dark:text-gray-100 font-black whitespace-nowrap">Tampilkan</span>
                        <select wire:model.live="perPage" class="bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 transition-colors duration-200 font-bold">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="text-sm text-gray-900 dark:text-gray-100 font-black">data</span>
                    </div>

                    <div class="min-w-48 flex-1 sm:flex-none">
                        <select wire:model.live="kecamatanFilter"
                            class="w-full bg-white dark:bg-gray-800 border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 font-bold">
                            <option value="">Semua Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="min-w-48 flex-1 sm:flex-none">
                        <select wire:model.live="statusSinyalFilter"
                            class="w-full bg-white dark:bg-gray-800 border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 font-bold">
                            <option value="">Semua Status Sinyal</option>
                            <option value="Blankspot">Blankspot</option>
                            <option value="Lemah Sinyal">Lemah Sinyal</option>
                            <option value="Sinyal Baik">Sinyal Baik</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                    <div class="flex items-center gap-2 w-full lg:w-auto flex-1">
                        <div class="relative flex-1 lg:min-w-[400px]">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-900 dark:text-gray-400"></i>
                            </div>
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nagari..."
                                class="block w-full pl-10 pr-3 py-2 border border-gray-400 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white sm:text-sm transition-all duration-200 font-bold placeholder-gray-500">
                        </div>
                        <button wire:click="exportPdf" wire:loading.attr="disabled"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-black rounded-lg shadow-md hover:shadow-lg transition-all duration-200 uppercase text-[10px] tracking-wider whitespace-nowrap disabled:opacity-50">
                            <i class="fas fa-file-pdf mr-2 text-xs"></i>
                            PDF
                        </button>
                    </div>
                    <div wire:loading wire:target="exportPdf" class="flex items-center text-red-600 dark:text-red-400 animate-pulse ml-2">
                        <i class="fas fa-spinner animate-spin mr-2"></i>
                        <span class="text-[10px] font-black uppercase tracking-tight">Proses Eksport ke PDF...</span>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-xl border border-gray-200 dark:border-gray-700">
                <!-- Loading Overlay (Data Only) -->
                <div wire:loading.flex wire:target="search, perPage, kecamatanFilter, statusSinyalFilter, sortBy, gotoPage, nextPage, previousPage" class="absolute inset-0 z-10 items-center justify-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-[1px]">
                    <div class="flex flex-col items-center">
                        <i class="fas fa-circle-notch animate-spin text-4xl text-blue-700 mb-2"></i>
                        <span class="text-sm font-black text-blue-700 dark:text-blue-400 uppercase tracking-widest">Sinkronisasi...</span>
                    </div>
                </div>

                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                    <thead class="text-xs text-black uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-black border-r border-gray-300 dark:border-gray-600 w-16 text-center text-black dark:text-white">No</th>
                            <th scope="col" wire:click="sortBy('nama_nagari')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 text-black dark:text-white">
                                <div class="flex items-center">
                                    NAMA NAGARI
                                    <span class="ml-2 flex flex-col items-center">
                                        <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nama_nagari' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                        <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nama_nagari' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
                                    </span>
                                </div>
                            </th>
                            <th scope="col" wire:click="sortBy('kecamatan')" class="px-6 py-4 font-bold cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                <div class="flex items-center">
                                    Kecamatan
                                    <span class="ml-2 flex flex-col items-center">
                                        <i class="fas fa-caret-up text-[10px] {{ $sortField === 'kecamatan' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                        <i class="fas fa-caret-down text-[10px] {{ $sortField === 'kecamatan' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
                                    </span>
                                </div>
                            </th>
                            <th scope="col" wire:click="sortBy('nama_wali_nagari')" class="px-6 py-4 font-bold cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                <div class="flex items-center">
                                    Wali Nagari
                                    <span class="ml-2 flex flex-col items-center">
                                        <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nama_wali_nagari' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                        <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nama_wali_nagari' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
                                    </span>
                                </div>
                            </th>
                            <th scope="col" wire:click="sortBy('jumlah_penduduk')" class="px-6 py-4 font-black text-right cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 text-black dark:text-white">
                                <div class="flex items-center justify-end">
                                    Penduduk
                                    <span class="ml-2 flex flex-col items-center">
                                        <i class="fas fa-caret-up text-[10px] {{ $sortField === 'jumlah_penduduk' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                        <i class="fas fa-caret-down text-[10px] {{ $sortField === 'jumlah_penduduk' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                    </span>
                                </div>
                            </th>
                            <th scope="col" wire:click="sortBy('luas_nagari')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 text-black dark:text-white">
                                <div class="flex items-center justify-center">
                                    Luas (Ha)
                                    <span class="ml-2 flex flex-col items-center">
                                        <i class="fas fa-caret-up text-[10px] {{ $sortField === 'luas_nagari' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                        <i class="fas fa-caret-down text-[10px] {{ $sortField === 'luas_nagari' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                    </span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 font-bold text-center">Status Sinyal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 dark:divide-gray-700 bg-white dark:bg-gray-800">
                        <!-- Skeleton Rows while loading -->
                        @for ($i = 0; $i < $perPage; $i++)
                            <tr wire:loading class="animate-pulse">
                                <td class="px-6 py-4 border-r border-gray-300 dark:border-gray-700/50 text-center"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-8 mx-auto"></div></td>
                                <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-48 mb-2"></div><div class="h-3 bg-gray-100 dark:bg-gray-800 rounded w-32"></div></td>
                                <td class="px-6 py-4"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-24"></div></td>
                                <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32"></div></td>
                                <td class="px-6 py-4 text-right"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-16 ml-auto"></div></td>
                                <td class="px-6 py-4 text-center"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-16 mx-auto"></div></td>
                                <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-24 mx-auto"></div></td>
                            </tr>
                        @endfor

                        @forelse($nagaris as $nagari)
                            <tr wire:loading.remove wire:key="nag-{{ $nagari->id }}" class="hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-colors duration-150 group">
                                <td class="px-6 py-4 text-center text-gray-700 dark:text-gray-400 font-black border-r border-gray-300 dark:border-gray-700/50">
                                    {{ ($nagaris->currentPage() - 1) * $nagaris->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ url('/list-jorong') }}?nagariFilter={{ $nagari->id }}" wire:navigate class="text-blue-800 dark:text-blue-400 font-black hover:text-blue-700 dark:hover:text-blue-300 group-hover:underline flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                        {{ $nagari->nama_nagari }}
                                    </a>
                                    <div class="text-[10px] text-gray-600 dark:text-gray-400 mt-0.5 flex items-center font-black">
                                        <span class="mr-2"><i class="fas fa-building mr-1"></i>{{ $nagari->jorongs_count }} Jorong</span>
                                        <span><i class="fas fa-broadcast-tower mr-1"></i>{{ $nagari->bts_count }} BTS</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900/40 text-green-900 dark:text-green-300 text-[11px] font-black rounded-lg border border-green-300 dark:border-green-800">
                                        {{ $nagari->kecamatan->nama ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100 font-black uppercase text-xs">
                                    {{ $nagari->nama_wali_nagari }}
                                </td>
                                <td class="px-6 py-4 text-right font-black text-gray-900 dark:text-white">
                                    {{ number_format($nagari->jumlah_penduduk_nagari ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center text-gray-900 dark:text-gray-100 font-black">
                                    {{ number_format($nagari->luas_nagari ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @php
                                        $statusSinyal = $nagari->status_sinyal;
                                        $badgeStyle = match ($statusSinyal) {
                                            'Blankspot' => 'bg-red-100 text-red-800 border-red-200 dark:bg-red-900/50 dark:text-red-200 dark:border-red-800',
                                            'Lemah Sinyal' => 'bg-yellow-100 text-yellow-800 border-yellow-200 dark:bg-yellow-900/50 dark:text-yellow-200 dark:border-yellow-800',
                                            'Sinyal Baik' => 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/50 dark:text-green-200 dark:border-green-800',
                                            default => 'bg-gray-100 text-gray-800 border-gray-200 dark:bg-gray-900/50 dark:text-gray-200 dark:border-gray-800',
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-black border-2 {{ $badgeStyle }} uppercase tracking-wider">
                                        {{ $statusSinyal }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr wire:loading.remove>
                                <td colspan="7" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <i class="fas fa-search-minus text-6xl mb-4 opacity-10"></i>
                                        <p class="text-xl font-black uppercase tracking-tighter text-gray-900 dark:text-gray-100">Data Tidak Ditemukan</p>
                                        <p class="text-sm italic font-medium">Kata kunci atau filter yang Anda pilih tidak membuahkan hasil.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- DataTables Footer Controls -->
            <div class="mt-8 flex flex-col md:flex-row justify-between items-center gap-6 bg-white dark:bg-gray-800 p-4 rounded-xl shadow-lg border border-gray-300 dark:border-gray-700">
                <div class="text-sm text-gray-900 dark:text-gray-100 font-black">
                    Menampilkan <span class="text-blue-800 dark:text-blue-400 font-black">{{ $nagaris->firstItem() ?? 0 }}</span> sampai <span class="text-blue-800 dark:text-blue-400 font-black">{{ $nagaris->lastItem() ?? 0 }}</span> dari <span class="text-blue-800 dark:text-blue-400 font-black">{{ $nagaris->total() }}</span> entri data
                </div>
                <div class="pagination-wrapper">
                    {{ $nagaris->links('vendor.livewire.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
