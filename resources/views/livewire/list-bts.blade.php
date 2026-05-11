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

                <!-- Filters Section -->
                <div class="mb-6 p-6 bg-gray-50 dark:bg-gray-800/50 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                        <!-- Left Side: Basic Filters -->
                        <div class="flex flex-wrap items-center gap-4">
                            <div class="flex items-center bg-white dark:bg-gray-900 px-3 rounded-lg border border-gray-300 dark:border-gray-700">
                                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mr-2">Show</span>
                                <select wire:model.live="perPage" class="bg-transparent border-none text-sm rounded-lg focus:ring-0 py-2 pl-0 pr-8 font-bold text-gray-900 dark:text-white cursor-pointer">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                            <div class="flex-1 min-w-[180px]">
                                <select wire:model.live="operatorFilter" class="w-full bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 font-bold">
                                    <option value="">Semua Operator</option>
                                    @foreach ($operators as $operator)
                                        <option value="{{ $operator->id }}">{{ $operator->nama_operator }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex-1 min-w-[180px]">
                                <select wire:model.live="kecamatanFilter" class="w-full bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 font-bold">
                                    <option value="">Semua Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Right Side: Search & Advanced Filters -->
                        <div class="flex flex-wrap items-center gap-4 justify-end">
                            <div class="relative flex-1 min-w-[250px]">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari BTS..."
                                    class="block w-full pl-10 pr-3 py-2.5 bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:text-white sm:text-sm font-bold placeholder-gray-500">
                            </div>

                            <button wire:click="exportPdf" wire:loading.attr="disabled"
                                class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg uppercase text-[11px] tracking-wider transition-colors disabled:opacity-50">
                                <i class="fas fa-file-pdf mr-2"></i>
                                PDF
                            </button>
                                <div wire:loading wire:target="exportPdf" class="px-2">
                                    <i class="fas fa-circle-notch animate-spin text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tech & Status Filters -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                        <select wire:model.live="teknologiFilter" class="bg-white dark:bg-slate-800/50 border-slate-200 dark:border-slate-700 text-xs rounded-xl p-3 font-bold uppercase tracking-widest text-slate-500">
                            <option value="">Semua Teknologi</option>
                            <option value="2G">2G Network</option>
                            <option value="3G">3G Network</option>
                            <option value="4G">4G LTE</option>
                            <option value="4G+5G">4G+ & 5G Hybrid</option>
                            <option value="5G">5G Pure</option>
                        </select>

                        <select wire:model.live="statusFilter" class="bg-white dark:bg-slate-800/50 border-slate-200 dark:border-slate-700 text-xs rounded-xl p-3 font-bold uppercase tracking-widest text-slate-500">
                            <option value="">Semua Status</option>
                            <option value="aktif">Status: Aktif</option>
                            <option value="non-aktif">Status: Non-Aktif</option>
                        </select>

                        <div class="flex items-center gap-2 bg-slate-50 dark:bg-slate-900/30 p-2 rounded-xl border border-slate-200 dark:border-slate-700 col-span-2">
                            <span class="px-3 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tahun Bangun</span>
                            <select wire:model.live="tahunFilter" class="bg-white dark:bg-slate-800 border-none text-[11px] rounded-lg p-1.5 font-black flex-1">
                                <option value="">Mulai</option>
                                @for ($year = date('Y'); $year >= 2000; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <i class="fas fa-arrow-right text-[10px] text-slate-300"></i>
                            <select wire:model.live="tahunFilterTo" class="bg-white dark:bg-slate-800 border-none text-[11px] rounded-lg p-1.5 font-black flex-1">
                                <option value="">Sampai</option>
                                @for ($year = date('Y'); $year >= 2000; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
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
