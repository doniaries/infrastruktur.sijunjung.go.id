<div class="min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors duration-500 py-8">
    <div class="max-w-[98%] mx-auto px-4">
        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-800">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4 border-b border-gray-200 dark:border-gray-700 pb-6">
                <div>
                    <h2 class="text-2xl font-black uppercase tracking-tight text-gray-900 dark:text-white">Data Kecamatan Sijunjung</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-xs font-bold mt-1 uppercase tracking-widest">Regional Level Infrastructure Data</p>
                </div>
                <div class="flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                    <i class="fas fa-map-marked-alt mr-3 text-blue-600"></i>
                    <span class="text-gray-900 dark:text-white font-black text-lg">{{ number_format($kecamatans->total()) }}</span>
                    <span class="ml-2 text-gray-500 text-[10px] font-bold uppercase tracking-widest">Wilayah</span>
                </div>
            </div>

            <!-- Filters Section: Single Row Design -->
            <div class="mb-6 flex flex-wrap items-center gap-2">
                <!-- Search Bar (Flexible) -->
                <div class="relative flex-1 min-w-[300px]">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 text-xs"></i>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari Kecamatan..."
                        class="block w-full pl-9 pr-4 py-2 bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg focus:ring-1 focus:ring-blue-500 text-sm font-medium shadow-sm transition-all">
                </div>

                <select wire:model.live="perPage" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase min-w-[80px]">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <!-- Table Section -->
            <div class="relative overflow-x-auto bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800">
                <!-- Loading Overlay -->
                <div wire:loading.flex class="absolute inset-0 z-10 items-center justify-center bg-gray-900/10 backdrop-blur-[2px]">
                    <div class="flex flex-col items-center">
                        <i class="fas fa-circle-notch animate-spin text-3xl text-blue-600 mb-2"></i>
                        <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Loading...</span>
                    </div>
                </div>

                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr class="text-gray-600 dark:text-gray-400 text-[11px] font-bold uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">
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
                            <th scope="col" wire:click="sortBy('total_penduduk')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 w-32 text-black dark:text-white">
                                <div class="flex items-center justify-center">
                                    PENDUDUK
                                    <span class="ml-2 flex flex-col items-center">
                                        <i class="fas fa-caret-up text-[10px] {{ $sortField === 'total_penduduk' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                        <i class="fas fa-caret-down text-[10px] {{ $sortField === 'total_penduduk' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                    </span>
                                </div>
                            </th>
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
                                    <span class="px-3 py-1 bg-slate-900 text-white border border-slate-800 dark:bg-white/10 dark:text-white dark:border-white/20 dark:backdrop-blur-md text-[11px] font-black rounded-full uppercase tracking-tighter">
                                        {{ $kecamatan->nagari_count }} Nagari
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center font-black text-gray-900 dark:text-gray-100 italic">
                                    {{ number_format($kecamatan->total_penduduk ?? 0, 0, ',', '.') }} Jiwa
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

            <!-- Pagination Footer -->
            <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-4 bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl border border-gray-200 dark:border-gray-700">
                <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">
                    Showing {{ $kecamatans->firstItem() ?? 0 }} to {{ $kecamatans->lastItem() ?? 0 }} of {{ number_format($kecamatans->total()) }} entries
                </div>
                <div>
                    {{ $kecamatans->links('vendor.livewire.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
