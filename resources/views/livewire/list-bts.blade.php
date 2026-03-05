<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Title Section -->
                <div class="flex justify-center mb-8">
                    <div class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-black rounded-xl shadow-xl transform hover:scale-105 transition-all duration-300 border border-blue-800/20"
                         style="background: linear-gradient(to right, #1d4ed8, #3730a3);">
                        <i class="fas fa-tower-broadcast mr-3 text-xl text-white"></i>
                        <h2 class="text-2xl uppercase tracking-wider text-white">DATA BTS (Base Transceiver Station)</h2>
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

                        <div class="min-w-[180px] flex-1 sm:flex-none">
                            <select wire:model.live="operatorFilter" class="w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 font-bold">
                                <option value="">Semua Operator</option>
                                @foreach ($operators as $operator)
                                    <option value="{{ $operator->id }}">{{ $operator->nama_operator }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="min-w-[180px] flex-1 sm:flex-none">
                            <select wire:model.live="kecamatanFilter" class="w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 font-bold">
                                <option value="">Semua Kecamatan</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="min-w-[140px] flex-1 sm:flex-none">
                            <select wire:model.live="teknologiFilter" class="w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 font-bold">
                                <option value="">Semua Teknologi</option>
                                <option value="2G">2G</option>
                                <option value="3G">3G</option>
                                <option value="4G">4G</option>
                                <option value="4G+5G">4G+5G</option>
                                <option value="5G">5G</option>
                            </select>
                        </div>

                        <div class="min-w-[140px] flex-1 sm:flex-none">
                            <select wire:model.live="statusFilter" class="w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 font-bold">
                                <option value="">Semua Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="non-aktif">Non-Aktif</option>
                            </select>
                        </div>
                    </div>

                    <!-- Second Row: Search, Years and Export -->
                    <div class="flex flex-col lg:flex-row justify-between items-center gap-4 border-t border-gray-300 dark:border-gray-700 pt-4">
                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto flex-1">
                            <div class="relative flex-1 sm:min-w-[300px]">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-900 dark:text-gray-400"></i>
                                </div>
                                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari BTS..."
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-400 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white sm:text-sm transition-all duration-200 font-bold placeholder-gray-500">
                            </div>

                            <div class="flex items-center gap-2 bg-white dark:bg-gray-800 p-1 rounded-lg border border-gray-400 dark:border-gray-600">
                                <select wire:model.live="tahunFilter" class="bg-transparent border-none text-[10px] focus:ring-0 p-1.5 dark:text-white font-black">
                                    <option value="">Tahun</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                <span class="text-gray-900 dark:text-gray-400 font-black">-</span>
                                <select wire:model.live="tahunFilterTo" class="bg-transparent border-none text-[10px] focus:ring-0 p-1.5 dark:text-white font-black">
                                    <option value="">s/d</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="flex items-center gap-3">
                                <button wire:click="exportPdf" wire:loading.attr="disabled"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-black rounded-lg shadow-md hover:shadow-lg transition-all duration-200 uppercase text-[10px] tracking-wider whitespace-nowrap disabled:opacity-50">
                                    <i class="fas fa-file-pdf mr-2 text-xs"></i>
                                    PDF
                                </button>
                                <div wire:loading wire:target="exportPdf" class="flex items-center text-red-600 dark:text-red-400 animate-pulse">
                                    <i class="fas fa-spinner animate-spin mr-2"></i>
                                    <span class="text-[10px] font-black uppercase tracking-tight">Proses Eksport ke PDF...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="relative overflow-x-auto shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-700">
                    <!-- Loading Overlay (Data Only) -->
                    <div wire:loading.flex wire:target="search, perPage, kecamatanFilter, operatorFilter, teknologiFilter, statusFilter, tahunFilter, tahunFilterTo, sortBy, gotoPage, nextPage, previousPage" class="absolute inset-0 z-10 items-center justify-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-[1px]">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-circle-notch animate-spin text-4xl text-blue-700 mb-2"></i>
                            <span class="text-sm font-black text-blue-700 dark:text-blue-400 uppercase tracking-widest">Sinkronisasi...</span>
                        </div>
                    </div>

                    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                        <thead class="text-xs text-black uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                            <tr>
                                <th scope="col" wire:click="sortBy('operator')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 text-black dark:text-white">
                                    <div class="flex items-center">
                                        Operator
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'operator' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'operator' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('kecamatan')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center">
                                        Kecamatan
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'kecamatan' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'kecamatan' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('nagari')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center">
                                        Nagari
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nagari' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nagari' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 font-black text-center text-black dark:text-white">Koordinat</th>
                                <th scope="col" wire:click="sortBy('alamat')" class="px-6 py-4 font-black cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 min-w-[200px] text-black dark:text-white">
                                    <div class="flex items-center">
                                        Alamat
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'alamat' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'alamat' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('teknologi')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 text-black dark:text-white">
                                    <div class="flex items-center justify-center">
                                        Teknologi
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'teknologi' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'teknologi' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('status')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 text-black dark:text-white">
                                    <div class="flex items-center justify-center">
                                        Status
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'status' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'status' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('tahun_bangun')" class="px-6 py-4 font-black text-center cursor-pointer hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 whitespace-nowrap text-black dark:text-white">
                                    <div class="flex items-center justify-center">
                                        Tahun Bangun
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'tahun_bangun' && $sortDirection === 'asc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'tahun_bangun' && $sortDirection === 'desc' ? 'text-blue-700' : 'text-gray-500 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 dark:divide-gray-700 bg-white dark:bg-gray-800">
                            <!-- Skeleton Rows while loading -->
                            @for ($i = 0; $i < $perPage; $i++)
                                <tr wire:loading class="animate-pulse">
                                    <td class="px-6 py-4"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-24"></div></td>
                                    <td class="px-6 py-4"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-24"></div></td>
                                    <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-20"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-24 mx-auto"></div></td>
                                    <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-5 bg-gray-200 dark:bg-gray-700 rounded w-10 mx-auto"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-16 mx-auto"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-12 mx-auto"></div></td>
                                </tr>
                            @endfor

                            @forelse($bts as $item)
                                <tr wire:loading.remove wire:key="bts-{{ $item->id }}" class="hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-colors duration-150 group">
                                    <td class="px-6 py-4">
                                        @php
                                            $opName = strtoupper($item->operator->nama_operator ?? '');
                                            $opClasses = match(true) {
                                                str_contains($opName, 'TELKOMSEL') => 'bg-red-100 dark:bg-red-900/40 text-red-900 dark:text-red-300 border-red-200',
                                                str_contains($opName, 'INDOSAT') => 'bg-yellow-100 dark:bg-yellow-900/40 text-yellow-900 dark:text-yellow-300 border-yellow-200',
                                                str_contains($opName, 'XL') => 'bg-blue-100 dark:bg-blue-900/40 text-blue-900 dark:text-blue-300 border-blue-200',
                                                default => 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-300 border-gray-200'
                                            };
                                        @endphp
                                        <span class="px-2.5 py-1 {{ $opClasses }} text-[11px] font-black rounded-lg uppercase tracking-tight shadow-sm border">
                                            {{ $item->operator->nama_operator ?? 'TIDAK DIKETAHUI' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-green-100 dark:bg-green-900/40 text-green-900 dark:text-green-300 text-[11px] font-black rounded-lg whitespace-nowrap border border-green-200">
                                            {{ $item->kecamatan->nama ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-black text-gray-900 dark:text-white uppercase text-xs">
                                        {{ $item->nagari->nama_nagari ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center font-mono text-[11px] text-gray-900 dark:text-gray-400 whitespace-nowrap font-black">
                                        {{ $item->titik_koordinat }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-300 text-xs italic font-bold">
                                        {{ $item->alamat }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $tekClasses = match($item->teknologi) {
                                                '2G' => 'bg-gray-100 text-gray-900 border-gray-300',
                                                '3G' => 'bg-blue-100 text-blue-900 border-blue-300',
                                                '4G' => 'bg-green-100 text-green-900 border-green-300',
                                                '4G+5G' => 'bg-cyan-100 text-cyan-900 border-cyan-300',
                                                '5G' => 'bg-purple-100 text-purple-900 border-purple-300',
                                                default => 'bg-gray-100 text-gray-900'
                                            };
                                        @endphp
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-black border {{ $tekClasses }} uppercase">
                                            {{ $item->teknologi }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $st = strtolower($item->status);
                                            $statusActive = ($st === 'aktif');
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black border-2 uppercase tracking-widest {{ $statusActive ? 'bg-green-100 text-green-900 border-green-400 dark:bg-green-900/50 dark:text-green-200' : 'bg-red-100 text-red-900 border-red-400 dark:bg-red-900/50 dark:text-red-200' }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center justify-center px-3 py-1 bg-gray-100 dark:bg-gray-700/50 text-gray-900 dark:text-white text-xs font-black rounded-lg border border-gray-300 dark:border-gray-600 min-w-[50px]">
                                            {{ $item->tahun_bangun }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr wire:loading.remove>
                                    <td colspan="8" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <i class="fas fa-tower-broadcast text-6xl mb-4 opacity-10"></i>
                                            <p class="text-xl font-bold tracking-tighter uppercase text-gray-900 dark:text-gray-100">MASA PENCARIAN NIHIL</p>
                                            <p class="text-sm italic font-medium">Coba sesuaikan kata kunci atau filter operator/wilayah Anda.</p>
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
                        Menampilkan <span class="text-blue-800 dark:text-blue-400 font-black">{{ $bts->firstItem() ?? 0 }}</span> - <span class="text-blue-800 dark:text-blue-400 font-black">{{ $bts->lastItem() ?? 0 }}</span> dari total <span class="text-blue-800 dark:text-blue-400 font-black">{{ $bts->total() }}</span> entri data
                    </div>
                    <div class="pagination-wrapper">
                        {{ $bts->links('vendor.livewire.custom-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
