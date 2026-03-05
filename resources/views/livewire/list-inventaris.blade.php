<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Title Section -->
                <div class="flex justify-center mb-8">
                    <div class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-black rounded-xl shadow-xl transform hover:scale-105 transition-all duration-300 border border-blue-800/20" 
                         style="background: linear-gradient(to right, #1d4ed8, #3730a3);">
                        <i class="fas fa-folder-open mr-3 text-xl text-white"></i>
                        <h2 class="text-2xl uppercase tracking-wider text-white">DATA INVENTARIS</h2>
                        <span class="ml-3 px-3 py-1 bg-white/30 backdrop-blur-sm rounded-full text-sm border border-white/40 text-white font-black">{{ $totalData }}</span>
                    </div>
                </div>

                <!-- DataTables Header Controls -->
                <div class="mb-6 flex flex-col space-y-4 bg-gray-50 dark:bg-gray-900/50 p-6 rounded-xl border border-gray-200 dark:border-gray-700">
                    <!-- First Row: Entries and Filters -->
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center space-x-2 mr-4">
                            <span class="text-sm text-gray-900 dark:text-gray-100 font-black whitespace-nowrap">Tampilkan</span>
                            <select wire:model.live="perPage" class="bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 transition-colors duration-200 font-bold">
                                <option value="6">6</option>
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="48">48</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-sm text-gray-900 dark:text-gray-100 font-black">entri</span>
                        </div>

                        <div class="min-w-[200px] flex-1 sm:flex-none">
                            <select wire:model.live="opdFilter" class="w-full bg-white dark:bg-gray-800 border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 font-bold">
                                <option value="">Semua OPD</option>
                                @foreach ($opds as $opd)
                                    <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="min-w-[200px] flex-1 sm:flex-none">
                            <select wire:model.live="peralatanFilter" class="w-full bg-white dark:bg-gray-800 border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 font-bold">
                                <option value="">Semua Peralatan</option>
                                @foreach ($peralatans as $alat)
                                    <option value="{{ $alat->id }}">{{ $alat->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Second Row: Search -->
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4 border-t border-gray-300 dark:border-gray-700 pt-4">
                        <div class="relative w-full md:w-96">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-900 dark:text-gray-400"></i>
                            </div>
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari berdasarkan jenis, status, atau nama..."
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-400 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white sm:text-sm transition-all duration-200 font-bold placeholder-gray-500">
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="relative overflow-x-auto shadow-xl sm:rounded-xl border border-gray-300 dark:border-gray-700">
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
                                <th scope="col" class="px-6 py-4 font-black text-center w-20 text-black dark:text-white">NO</th>
                                <th scope="col" wire:click="sortBy('opd')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-150 text-black dark:text-white">
                                    <div class="flex items-center">
                                        OPD
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'opd' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'opd' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('peralatan')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-150 text-black dark:text-white">
                                    <div class="flex items-center">
                                        Peralatan
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'peralatan' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'peralatan' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 font-black uppercase tracking-wider text-black dark:text-white">Jenis Peralatan</th>
                                <th scope="col" wire:click="sortBy('jumlah')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-150 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center justify-center">
                                        Jumlah
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'jumlah' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'jumlah' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('status')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-150 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center justify-center">
                                        Status
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'status' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'status' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
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
                                    <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-48"></div></td>
                                    <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32"></div></td>
                                    <td class="px-6 py-4"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-24"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-12 mx-auto"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-20 mx-auto"></div></td>
                                </tr>
                            @endfor

                            @forelse($inventaris as $index => $item)
                                <tr wire:loading.remove wire:key="inventaris-{{ $item->id }}" class="hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-colors duration-150 group">
                                    <td class="px-6 py-4 text-center font-black text-gray-700 dark:text-gray-400 group-hover:text-blue-700 transition-colors duration-200 text-xs">
                                        {{ $inventaris->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 font-black text-gray-900 dark:text-white uppercase tracking-tight text-sm">
                                        {{ $item->opd?->nama ?? 'TIDAK TERIDENTIFIKASI' }}
                                    </td>
                                    <td class="px-6 py-4 italic font-black text-gray-800 dark:text-gray-300">
                                        {{ $item->peralatan?->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-900 dark:text-indigo-200 rounded-lg text-[10px] font-black uppercase border border-indigo-300 dark:border-indigo-800">
                                            {{ $item->jenis_peralatan }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center font-black">
                                        <span class="inline-flex items-center justify-center px-3 py-1 bg-blue-100 dark:bg-blue-900/40 text-blue-900 dark:text-blue-100 text-xs font-black rounded-lg border border-blue-300 dark:border-blue-700 min-w-[40px]">
                                            {{ $item->jumlah }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $st = strtolower($item->status);
                                            $stClasses = match(true) {
                                                str_contains($st, 'baik') => 'bg-green-100 text-green-900 border-green-400 dark:bg-green-900/40 dark:text-green-200 dark:border-green-800',
                                                str_contains($st, 'rusak') => 'bg-red-100 text-red-900 border-red-400 dark:bg-red-900/40 dark:text-red-200 dark:border-red-800',
                                                default => 'bg-yellow-100 text-yellow-900 border-yellow-400 dark:bg-yellow-900/40 dark:text-yellow-200 dark:border-yellow-800'
                                            };
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black border-2 uppercase tracking-widest {{ $stClasses }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr wire:loading.remove>
                                    <td colspan="6" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-600">
                                            <i class="fas fa-folder-open text-6xl mb-4 opacity-30"></i>
                                            <p class="text-xl font-black tracking-tighter uppercase">Data Inventaris Nihil</p>
                                            <p class="text-sm italic font-black">Coba sesuaikan kata kunci atau filter OPD Anda.</p>
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
                        Menampilkan <span class="text-blue-800 dark:text-blue-400 font-black">{{ $inventaris->firstItem() ?? 0 }}</span> - <span class="text-blue-800 dark:text-blue-400 font-black">{{ $inventaris->lastItem() ?? 0 }}</span> dari total <span class="text-blue-800 dark:text-blue-400 font-black">{{ $totalData }}</span> entri data
                    </div>
                    <div class="pagination-wrapper">
                        {{ $inventaris->links('vendor.livewire.custom-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>