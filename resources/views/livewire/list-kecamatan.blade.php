<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex justify-center mb-8">
                <div class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-black rounded-xl shadow-xl transform hover:scale-105 transition-all duration-300 border border-blue-800/20"
                     style="background: linear-gradient(to right, #1d4ed8, #3730a3);">
                    <i class="fas fa-map-marked-alt mr-3 text-xl text-white"></i>
                    <h2 class="text-2xl uppercase tracking-wider text-white">DATA KECAMATAN</h2>
                    <span class="ml-3 px-3 py-1 bg-white/30 backdrop-blur-sm rounded-full text-sm border border-white/40 text-white font-black">{{ $kecamatans->total() }}</span>
                </div>
            </div>

            <!-- DataTables Header Controls -->
            <div class="mb-6 flex flex-col md:flex-row justify-between items-center gap-4 bg-gray-50 dark:bg-gray-900/50 p-6 rounded-xl border border-gray-300 dark:border-gray-700">
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-900 dark:text-gray-100 font-black">Tampilkan</span>
                    <select wire:model.live="perPage" class="bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 transition-colors duration-200 font-bold">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-sm text-gray-900 dark:text-gray-100 font-black">data</span>
                </div>

                <div class="relative w-full md:w-80">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-900 dark:text-gray-400"></i>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari kecamatan..."
                        class="block w-full pl-10 pr-3 py-2.5 border border-gray-400 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white sm:text-sm transition-all duration-200 font-bold placeholder-gray-500">
                </div>
            </div>

            <!-- Table Container -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-xl border border-gray-200 dark:border-gray-700">
                <!-- Loading Overlay -->
                <div wire:loading.flex class="absolute inset-0 z-10 items-center justify-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-[1px]">
                    <div class="flex flex-col items-center">
                        <i class="fas fa-circle-notch animate-spin text-4xl text-blue-700 mb-2"></i>
                        <span class="text-sm font-black text-blue-700 dark:text-blue-400 uppercase tracking-widest">Sinkronisasi...</span>
                    </div>
                </div>

                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                    <thead class="text-xs text-black uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-black border-r border-gray-300 dark:border-gray-600 w-16 text-center text-black dark:text-white">No</th>
                            <th scope="col" wire:click="sortBy('nama')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 relative text-black dark:text-white">
                                <div class="flex items-center">
                                    NAMA KECAMATAN
                                    <span class="ml-2 flex flex-col items-center">
                                        <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nama' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                        <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nama' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                    </span>
                                </div>
                            </th>
                            <th scope="col" wire:click="sortBy('nagari_count')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 w-32 text-black dark:text-white">
                                <div class="flex items-center justify-center">
                                    NAGARI
                                    <span class="ml-2 flex flex-col items-center">
                                        <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nagari_count' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                        <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nagari_count' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                    </span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 font-black text-center w-32 text-black dark:text-white">PENDUDUK</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 dark:divide-gray-700 bg-white dark:bg-gray-800">
                        <!-- Skeleton Rows while loading -->
                        @for ($i = 0; $i < $perPage; $i++)
                            <tr wire:loading class="animate-pulse">
                                <td class="px-6 py-4 border-r border-gray-300 dark:border-gray-700/50"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-8 mx-auto"></div></td>
                                <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-3/4"></div></td>
                                <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-20 mx-auto"></div></td>
                                <td class="px-6 py-4 text-center"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-24 mx-auto"></div></td>
                            </tr>
                        @endfor

                        @forelse($kecamatans as $kecamatan)
                            <tr wire:loading.remove wire:key="kec-{{ $kecamatan->id }}" class="hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-colors duration-150 group">
                                <td class="px-6 py-4 text-center text-gray-700 dark:text-gray-400 font-black border-r border-gray-300 dark:border-gray-700/50 text-xs">
                                    {{ ($kecamatans->currentPage() - 1) * $kecamatans->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ url('/list-nagari') }}?kecamatanFilter={{ $kecamatan->id }}" wire:navigate class="text-blue-800 dark:text-blue-400 font-black hover:text-blue-900 dark:hover:text-blue-300 group-hover:underline flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                        {{ $kecamatan->nama }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/50 text-blue-900 dark:text-blue-100 text-[11px] font-black rounded-full border border-blue-200 dark:border-blue-800 uppercase tracking-tighter">
                                        {{ $kecamatan->nagari_count }} Nagari
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center font-black text-gray-900 dark:text-gray-100 italic">
                                    {{ number_format($kecamatan->nagari->sum('jumlah_penduduk_nagari'), 0, ',', '.') }} Jiwa
                                </td>
                            </tr>
                        @empty
                            <tr wire:loading.remove>
                                <td colspan="4" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <i class="fas fa-map-marked-alt text-6xl mb-4 opacity-10"></i>
                                        <p class="text-lg font-black tracking-tighter text-gray-900 dark:text-gray-100 uppercase">Data Tidak Ditemukan</p>
                                        <p class="text-sm italic font-medium">Maaf, pencarian "{{ $search }}" nihil untuk wilayah Kecamatan.</p>
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
                    Menampilkan <span class="text-blue-800 dark:text-blue-400 font-black">{{ $kecamatans->firstItem() ?? 0 }}</span> - <span class="text-blue-800 dark:text-blue-400 font-black">{{ $kecamatans->lastItem() ?? 0 }}</span> dari total <span class="text-blue-800 dark:text-blue-400 font-black">{{ $kecamatans->total() }}</span> entri data
                </div>
                <div>
                    {{ $kecamatans->links('vendor.livewire.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
