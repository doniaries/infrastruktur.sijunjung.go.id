<div class="min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors duration-500 py-8">
    <div class="max-w-[98%] mx-auto px-4">
        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-800">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4 border-b border-gray-200 dark:border-gray-700 pb-6">
                <div>
                    <h2 class="text-2xl font-black uppercase tracking-tight text-gray-900 dark:text-white">Data Nagari Sijunjung</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-xs font-bold mt-1 uppercase tracking-widest">Village Level Infrastructure Data</p>
                </div>
                <div class="flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                    <i class="fas fa-city mr-3 text-blue-600"></i>
                    <span class="text-gray-900 dark:text-white font-black text-lg">{{ number_format($totalData) }}</span>
                    <span class="ml-2 text-gray-500 text-[10px] font-bold uppercase tracking-widest">Nagari</span>
                </div>
            </div>

            <!-- Filters Section: Single Row Design -->
            <div class="mb-6 flex flex-wrap items-center gap-2">
                <!-- Search Bar (Flexible) -->
                <div class="relative flex-1 min-w-[300px]">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 text-xs"></i>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari Nagari (Nama Nagari, Kecamatan)..."
                        class="block w-full pl-9 pr-4 py-2 bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg focus:ring-1 focus:ring-blue-500 text-sm font-medium shadow-sm transition-all">
                </div>

                <!-- Filters Group -->
                <div class="flex flex-wrap items-center gap-2">
                    <select wire:model.live="kecamatanFilter" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase min-w-[120px]">
                        <option value="">Kecamatan</option>
                        @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                        @endforeach
                    </select>

                    <select wire:model.live="statusSinyalFilter" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase min-w-[120px]">
                        <option value="">Status Sinyal</option>
                        <option value="Blankspot">Blankspot</option>
                        <option value="Lemah Sinyal">Lemah Sinyal</option>
                        <option value="Sinyal Baik">Sinyal Baik</option>
                    </select>

                    <select wire:model.live="perPage" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <button wire:click="exportPdf" wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg text-xs transition-all shadow-md active:scale-95 whitespace-nowrap">
                        <i class="fas fa-file-pdf mr-2"></i>
                        PDF
                    </button>
                </div>
            </div>

            <!-- Table Section -->
            <div class="relative overflow-x-auto bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800">
                <!-- Loading Overlay -->
                <div wire:loading.flex wire:target="search, perPage, kecamatanFilter, statusSinyalFilter, sortBy, gotoPage, nextPage, previousPage" class="absolute inset-0 z-10 items-center justify-center bg-gray-900/10 backdrop-blur-[2px]">
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
                                    <span class="px-2 py-1 bg-slate-100 text-slate-900 border border-slate-200 dark:bg-white/10 dark:text-white dark:border-white/20 dark:backdrop-blur-md text-[11px] font-black rounded-lg">
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
                                            'Blankspot' => 'bg-red-100 text-red-700 border-red-200 dark:bg-red-500/20 dark:text-red-200 dark:border-red-500/30 dark:backdrop-blur-md',
                                            'Lemah Sinyal' => 'bg-amber-100 text-amber-700 border-amber-200 dark:bg-amber-500/20 dark:text-amber-200 dark:border-amber-500/30 dark:backdrop-blur-md',
                                            'Sinyal Baik' => 'bg-emerald-100 text-emerald-700 border-emerald-200 dark:bg-emerald-500/20 dark:text-emerald-200 dark:border-emerald-500/30 dark:backdrop-blur-md',
                                            default => 'bg-slate-100 text-slate-900 border-slate-200 dark:bg-white/10 dark:text-white dark:border-white/20 dark:backdrop-blur-md',



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

            <!-- Pagination Footer -->
            <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-4 bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl border border-gray-200 dark:border-gray-700">
                <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">
                    Showing {{ $nagaris->firstItem() ?? 0 }} to {{ $nagaris->lastItem() ?? 0 }} of {{ number_format($nagaris->total()) }} entries
                </div>
                <div class="pagination-wrapper">
                    {{ $nagaris->links('vendor.livewire.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
