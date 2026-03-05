<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Title Section -->
                <div class="flex justify-center mb-8">
                    <div class="inline-flex items-center px-6 py-3 bg-green-700 text-white font-black rounded-xl shadow-xl transform hover:scale-105 transition-all duration-300 border border-green-800/20"
                         style="background: linear-gradient(to right, #059669, #0d9488);">
                        <i class="fas fa-map-pin mr-3 text-xl text-white"></i>
                        <h2 class="text-2xl uppercase tracking-wider text-white">DATA JORONG</h2>
                        <span class="ml-3 px-3 py-1 bg-white/30 backdrop-blur-sm rounded-full text-sm border border-white/40 text-white font-black">{{ $totalData }}</span>
                    </div>
                </div>

                <!-- DataTables Header Controls -->
                <div class="mb-6 flex flex-col space-y-4 bg-gray-50 dark:bg-gray-900/50 p-6 rounded-xl border border-gray-100 dark:border-gray-700">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-900 dark:text-gray-100 font-black whitespace-nowrap">Tampilkan</span>
                            <select wire:model.live="perPage" class="bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2 transition-colors duration-200 font-bold">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-sm text-gray-900 dark:text-gray-100 font-black">data</span>
                        </div>

                        <div class="min-w-[200px] flex-1 sm:flex-none">
                            <select wire:model.live="kecamatanFilter"
                                class="w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2 font-bold">
                                <option value="">Semua Kecamatan</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="min-w-[200px] flex-1 sm:flex-none">
                            <select wire:model.live="nagariFilter"
                                class="w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2 font-bold">
                                <option value="">Semua Nagari</option>
                                @foreach ($nagaris as $nagari)
                                    <option value="{{ $nagari->id }}">{{ $nagari->nama_nagari }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="min-w-[200px] flex-1 sm:flex-none">
                            <select wire:model.live="statusSinyalFilter"
                                class="w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2 font-bold">
                                <option value="">Semua Status Sinyal</option>
                                <option value="Blankspot">Blankspot (Tanpa BTS)</option>
                                <option value="Sinyal Baik">Sinyal Baik (Ada BTS)</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 border-t border-gray-200 dark:border-gray-700 pt-4">
                        <div class="relative w-full sm:w-96">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-900 dark:text-gray-400"></i>
                            </div>
                            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari jorong atau kepala jorong..."
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-400 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500/20 focus:border-green-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white sm:text-sm transition-all duration-200 font-bold placeholder-gray-500">
                        </div>
                        <button wire:click="exportPdf"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-black rounded-lg shadow-md hover:shadow-lg transition-all duration-200 uppercase text-[10px] tracking-wider">
                            <i class="fas fa-file-pdf mr-2 text-xs"></i>
                            PDF
                        </button>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="relative overflow-x-auto shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-700">
                    <!-- Loading Overlay -->
                    <div wire:loading.flex class="absolute inset-0 z-10 items-center justify-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-[1px]">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-circle-notch animate-spin text-4xl text-green-700 mb-2"></i>
                            <span class="text-sm font-black text-green-700 dark:text-green-400 uppercase tracking-widest">Sinkronisasi...</span>
                        </div>
                    </div>

                    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                        <thead class="text-xs text-black uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-black border-r border-gray-300 dark:border-gray-600 w-16 text-center text-black dark:text-white">No</th>
                                <th scope="col" wire:click="sortBy('nama_jorong')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center">
                                        NAMA JORONG
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nama_jorong' && $sortDirection === 'asc' ? 'text-green-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nama_jorong' && $sortDirection === 'desc' ? 'text-green-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('nagari')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center">
                                        NAGARI
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nagari' && $sortDirection === 'asc' ? 'text-green-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nagari' && $sortDirection === 'desc' ? 'text-green-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('kecamatan')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center">
                                        KECAMATAN
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'kecamatan' && $sortDirection === 'asc' ? 'text-green-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'kecamatan' && $sortDirection === 'desc' ? 'text-green-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('nama_kepala_jorong')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center">
                                        KEPALA JORONG
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nama_kepala_jorong' && $sortDirection === 'asc' ? 'text-green-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nama_kepala_jorong' && $sortDirection === 'desc' ? 'text-green-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('jumlah_penduduk_jorong')" class="px-6 py-4 font-black text-right cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center justify-end">
                                        Penduduk
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'jumlah_penduduk_jorong' && $sortDirection === 'asc' ? 'text-green-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'jumlah_penduduk_jorong' && $sortDirection === 'desc' ? 'text-green-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('luas_jorong')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center justify-center">
                                        Luas (Ha)
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'luas_jorong' && $sortDirection === 'asc' ? 'text-green-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'luas_jorong' && $sortDirection === 'desc' ? 'text-green-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 font-black text-center text-black dark:text-white">BTS</th>
                                <th scope="col" class="px-6 py-4 font-black text-center whitespace-nowrap text-black dark:text-white">Status Sinyal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 dark:divide-gray-700 bg-white dark:bg-gray-800">
                            <!-- Skeleton Rows while loading -->
                            @for ($i = 0; $i < $perPage; $i++)
                                <tr wire:loading class="animate-pulse">
                                    <td class="px-6 py-4 border-r border-gray-300 dark:border-gray-700/50 text-center"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-8 mx-auto"></div></td>
                                    <td class="px-6 py-4"><div class="h-5 bg-gray-200 dark:bg-gray-700 rounded-lg w-32"></div></td>
                                    <td class="px-6 py-4"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-24"></div></td>
                                    <td class="px-6 py-4"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-24"></div></td>
                                    <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32"></div></td>
                                    <td class="px-6 py-4 text-right"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-16 ml-auto"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-16 mx-auto"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-10 mx-auto"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-24 mx-auto"></div></td>
                                </tr>
                            @endfor

                            @forelse($jorongs as $jorong)
                                <tr wire:loading.remove wire:key="jor-{{ $jorong->id }}" class="hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-colors duration-150 group">
                                    <td class="px-6 py-4 text-center text-gray-700 dark:text-gray-400 font-black border-r border-gray-300 dark:border-gray-700/50 text-xs">
                                        {{ ($jorongs->currentPage() - 1) * $jorongs->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-black text-gray-900 dark:text-white group-hover:text-blue-800 dark:group-hover:text-blue-400 transition-colors">
                                            {{ $jorong->nama_jorong }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/40 text-blue-900 dark:text-blue-100 text-[11px] font-black rounded-lg whitespace-nowrap border border-blue-200 dark:border-blue-700">
                                            {{ $jorong->nagari->nama_nagari ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-indigo-100 dark:bg-indigo-900/40 text-indigo-900 dark:text-indigo-100 text-[11px] font-black rounded-lg whitespace-nowrap border border-indigo-200 dark:border-indigo-700">
                                            {{ $jorong->nagari->kecamatan->nama ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100 font-black uppercase text-xs">
                                        {{ $jorong->nama_kepala_jorong }}
                                    </td>
                                    <td class="px-6 py-4 text-right font-black text-gray-900 dark:text-white">
                                        {{ number_format($jorong->jumlah_penduduk_jorong ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-center text-gray-900 dark:text-gray-100 font-black">
                                        {{ number_format($jorong->luas_jorong ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center justify-center px-2 py-1 bg-teal-100 dark:bg-teal-900/40 text-teal-900 dark:text-teal-100 text-[11px] font-black rounded-lg min-w-[40px] border border-teal-200 dark:border-teal-700">
                                            {{ $jorong->bts_count }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $st = strtolower($jorong->status_sinyal);
                                            $stClasses = match(true) {
                                                str_contains($st, 'baik') => 'bg-green-100 text-green-900 border-green-400 dark:bg-green-900/40 dark:text-green-300 dark:border-green-800',
                                                default => 'bg-red-100 text-red-900 border-red-400 dark:bg-red-900/40 dark:text-red-300 dark:border-red-800'
                                            };
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black border-2 uppercase tracking-widest whitespace-nowrap shadow-sm {{ $stClasses }}">
                                            {{ $jorong->status_sinyal }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr wire:loading.remove>
                                    <td colspan="9" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <i class="fas fa-map-marked-alt text-6xl mb-4 opacity-10"></i>
                                            <p class="text-xl font-black uppercase tracking-tighter text-gray-900 dark:text-gray-100">MASA PENCARIAN NIHIL</p>
                                            <p class="text-sm italic font-medium">Coba sesuaikan kata kunci atau filter kecamatan/nagari Anda.</p>
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
                        Menampilkan <span class="text-blue-800 dark:text-blue-400 font-black">{{ $jorongs->firstItem() ?? 0 }}</span> - <span class="text-blue-800 dark:text-blue-400 font-black">{{ $jorongs->lastItem() ?? 0 }}</span> dari total <span class="text-blue-800 dark:text-blue-400 font-black">{{ $jorongs->total() }}</span> entri data
                    </div>
                    <div class="pagination-wrapper">
                        {{ $jorongs->links('vendor.livewire.custom-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
