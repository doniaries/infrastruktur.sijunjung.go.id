<div class="min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors duration-500">
    <div class="max-w-[98%] mx-auto px-4 py-8">
        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-800">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Title Section -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                    <div>
                        <h2 class="text-2xl font-black uppercase tracking-tight text-gray-900 dark:text-white">
                            Data BTS Sijunjung
                        </h2>
                        <p class="text-gray-500 dark:text-gray-400 text-xs font-bold mt-1 uppercase tracking-widest">Base Transceiver Station Inventory</p>
                    </div>
                    <div class="flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                        <i class="fas fa-tower-broadcast mr-3 text-blue-600"></i>
                        <span class="text-gray-900 dark:text-white font-black text-lg">{{ number_format($totalData) }}</span>
                        <span class="ml-2 text-gray-500 text-[10px] font-bold uppercase tracking-widest">Unit</span>
                    </div>
                </div>

                <!-- Filters Section: Single Row Design -->
                <div class="mb-6 flex flex-wrap items-center gap-2">
                    <!-- Search Bar (Flexible) -->
                    <div class="relative flex-1 min-w-[300px]">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400 text-xs"></i>
                        </div>
                        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari BTS (Lokasi, Operator, Alamat)..."
                            class="block w-full pl-9 pr-4 py-2 bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg focus:ring-1 focus:ring-blue-500 text-sm font-medium shadow-sm transition-all">
                    </div>

                    <!-- Categorical Filters Group -->
                    <div class="flex flex-wrap items-center gap-2">
                        <!-- Operator -->
                        <select wire:model.live="operatorFilter" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase min-w-[120px]">
                            <option value="">Operator</option>
                            @foreach ($operators as $operator)
                                <option value="{{ $operator->id }}">{{ $operator->nama_operator }}</option>
                            @endforeach
                        </select>

                        <!-- Kecamatan -->
                        <select wire:model.live="kecamatanFilter" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase min-w-[120px]">
                            <option value="">Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                            @endforeach
                        </select>

                        <!-- Teknologi -->
                        <select wire:model.live="teknologiFilter" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase min-w-[100px]">
                            <option value="">Network</option>
                            <option value="2G">2G</option>
                            <option value="3G">3G</option>
                            <option value="4G">4G</option>
                            <option value="4G+5G">4G+ & 5G</option>
                            <option value="5G">5G</option>
                        </select>

                        <!-- Status -->
                        <select wire:model.live="statusFilter" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase min-w-[100px]">
                            <option value="">Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="non-aktif">Non-Aktif</option>
                        </select>

                        <!-- Tahun Group -->
                        <div class="flex items-center gap-1 px-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg min-w-[150px]">
                            <select wire:model.live="tahunFilter" class="bg-transparent border-none text-[10px] font-black focus:ring-0 p-0 py-2 w-full text-center">
                                <option value="">Tahun</option>
                                @for ($year = date('Y'); $year >= 2000; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <span class="text-gray-300">-</span>
                            <select wire:model.live="tahunFilterTo" class="bg-transparent border-none text-[10px] font-black focus:ring-0 p-0 py-2 w-full text-center">
                                <option value="">End</option>
                                @for ($year = date('Y'); $year >= 2000; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Per Page -->
                        <select wire:model.live="perPage" class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 rounded-lg text-[10px] font-black py-2 px-3 focus:ring-1 focus:ring-blue-500 appearance-none cursor-pointer uppercase">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>

                        <!-- Action -->
                        <button wire:click="exportPdf" wire:loading.attr="disabled"
                            class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg text-xs transition-all shadow-md active:scale-95 whitespace-nowrap">
                            <i class="fas fa-file-pdf mr-2"></i>
                            PDF
                        </button>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="relative overflow-hidden bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800">
                    <!-- Loading Overlay -->
                    <div wire:loading.flex wire:target="search, perPage, kecamatanFilter, operatorFilter, teknologiFilter, statusFilter, tahunFilter, tahunFilterTo, sortBy, gotoPage, nextPage, previousPage" 
                        class="absolute inset-0 z-30 items-center justify-center bg-slate-900/10 backdrop-blur-[2px]">
                        <div class="p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 flex flex-col items-center">
                            <div class="w-10 h-10 border-4 border-blue-600 border-t-transparent rounded-full animate-spin mb-4"></div>
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-600 dark:text-blue-400">Loading...</span>
                        </div>
                    </div>

                    <div class="overflow-x-auto text-black dark:text-white">
                        <table class="w-full border-collapse">
                            <thead class="bg-gray-100 dark:bg-gray-800">
                                <tr class="text-gray-600 dark:text-gray-400 text-[11px] font-bold uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">
                                    <th class="px-6 py-4 text-left cursor-pointer hover:text-blue-600" wire:click="sortBy('operator')">
                                        Operator <i class="fas fa-sort ml-1 opacity-50"></i>
                                    </th>
                                    <th class="px-6 py-4 text-left cursor-pointer hover:text-blue-600" wire:click="sortBy('kecamatan')">
                                        Lokasi <i class="fas fa-sort ml-1 opacity-50"></i>
                                    </th>
                                    <th class="px-6 py-4 text-center">Koordinat</th>
                                    <th class="px-6 py-4 text-left">Alamat</th>
                                    <th class="px-6 py-4 text-center cursor-pointer hover:text-blue-600" wire:click="sortBy('teknologi')">
                                        Network <i class="fas fa-sort ml-1 opacity-50"></i>
                                    </th>
                                    <th class="px-6 py-4 text-center cursor-pointer hover:text-blue-600" wire:click="sortBy('status')">
                                        Status <i class="fas fa-sort ml-1 opacity-50"></i>
                                    </th>
                                    <th class="px-6 py-4 text-center cursor-pointer hover:text-blue-600" wire:click="sortBy('tahun_bangun')">
                                        Tahun <i class="fas fa-sort ml-1 opacity-50"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                @forelse($bts as $item)
                                    <tr wire:key="bts-row-{{ $item->id }}" class="group hover:bg-blue-50/30 dark:hover:bg-blue-900/10 transition-colors duration-150">
                                        <td class="px-6 py-4">
                                            @php
                                                $opName = strtoupper($item->operator->nama_operator ?? '');
                                                $opColor = match(true) {
                                                    str_contains($opName, 'TELKOMSEL') => 'text-red-600 dark:text-red-400',
                                                    str_contains($opName, 'INDOSAT') => 'text-amber-600 dark:text-amber-400',
                                                    str_contains($opName, 'XL') => 'text-blue-600 dark:text-blue-400',
                                                    str_contains($opName, 'SMARTFREN') => 'text-pink-600 dark:text-pink-400',
                                                    default => 'text-slate-600 dark:text-slate-400'
                                                };
                                            @endphp
                                            <div class="flex items-center gap-3">
                                                <div class="w-1 h-4 rounded-full bg-current {{ $opColor }}"></div>
                                                <span class="text-xs font-black uppercase tracking-wide {{ $opColor }}">
                                                    {{ $item->operator->nama_operator ?? 'TIDAK DIKETAHUI' }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col">
                                                <span class="text-[15px] font-black text-slate-900 dark:text-white uppercase tracking-tight leading-tight">
                                                    {{ $item->nagari->nama_nagari ?? '-' }}
                                                </span>
                                                <span class="text-[10px] text-slate-500 dark:text-slate-400 font-bold uppercase tracking-[0.1em] mt-0.5">
                                                    Kec. {{ $item->kecamatan->nama ?? '-' }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="font-mono text-[11px] text-slate-500 dark:text-slate-400 font-medium">
                                                {{ $item->titik_koordinat }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <p class="text-xs text-slate-600 dark:text-slate-400 font-medium leading-relaxed max-w-[200px] line-clamp-1 italic">
                                                {{ $item->alamat }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="px-3 py-1 rounded text-[10px] font-black bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700">
                                                {{ $item->teknologi }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @php
                                                $st = strtolower($item->status);
                                                $isAktif = ($st === 'aktif');
                                            @endphp
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-[10px] font-black uppercase tracking-wider {{ $isAktif ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' }}">
                                                <span class="w-1.5 h-1.5 rounded-full {{ $isAktif ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center text-xs font-black text-slate-700 dark:text-slate-300">
                                            {{ $item->tahun_bangun }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-20 text-center">
                                            <i class="fas fa-folder-open text-4xl text-slate-200 dark:text-slate-800 mb-4 block"></i>
                                            <h3 class="text-sm font-black uppercase tracking-widest text-slate-400">Data Tidak Ditemukan</h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination Footer -->
                <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-4 bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">
                        Showing {{ $bts->firstItem() ?? 0 }} to {{ $bts->lastItem() ?? 0 }} of {{ number_format($bts->total()) }} entries
                    </div>
                    
                    <div class="pagination-custom">
                        {{ $bts->links('vendor.livewire.custom-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .pagination-custom nav {
        @apply bg-transparent shadow-none border-none p-0;
    }
    .pagination-custom [role="navigation"] {
        @apply flex gap-2;
    }
    /* Animasi Hover Row halus */
    table tbody tr {
        @apply transition-colors duration-150;
    }
</style>
