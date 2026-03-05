<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Title Section -->
                <div class="flex justify-center mb-8">
                    <div class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-black rounded-xl shadow-xl transform hover:scale-105 transition-all duration-300 border border-blue-800/20"
                         style="background: linear-gradient(to right, #2563eb, #4338ca);">
                        <i class="fas fa-file-invoice mr-3 text-xl text-white"></i>
                        <h2 class="text-2xl uppercase tracking-wider text-white">DAFTAR LAPORAN</h2>
                        <span class="ml-3 px-3 py-1 bg-white/30 backdrop-blur-sm rounded-full text-sm border border-white/40 text-white font-black">{{ $totalLaporan }}</span>
                    </div>
                </div>

                <!-- DataTables Header Controls -->
                <div class="mb-6 flex flex-col space-y-4 bg-gray-50 dark:bg-gray-900/50 p-6 rounded-xl border border-gray-100 dark:border-gray-700">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600 dark:text-gray-400 font-medium whitespace-nowrap">Tampilkan</span>
                            <select wire:model.live="perPage" class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 transition-colors duration-200">
                                <option value="6">6</option>
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="48">48</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-sm text-gray-600 dark:text-gray-400 font-medium">entri</span>
                        </div>

                        <div class="flex flex-wrap items-center gap-3 flex-1 justify-end">
                            <div class="min-w-[160px]">
                                <select wire:model.live="statusFilter" class="w-full bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                    <option value="">Semua Status</option>
                                    <option value="Belum Diproses">Belum Diproses</option>
                                    <option value="Sedang Diproses">Sedang Diproses</option>
                                    <option value="Selesai Diproses">Selesai Diproses</option>
                                </select>
                            </div>
                            <div class="min-w-[200px]">
                                <select wire:model.live="opdFilter" class="w-full bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                    <option value="">Semua OPD</option>
                                    @foreach ($opds as $opd)
                                        <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative w-full md:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari laporan..."
                                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white sm:text-sm transition-all duration-200">
                            </div>
                            <a href="{{ route('public.laporform') }}" class="inline-flex items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg whitespace-nowrap">
                                <i class="fas fa-plus mr-2 text-xs"></i> Laporan Baru
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="relative overflow-x-auto shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-700">
                    <!-- Loading Overlay -->
                    <div wire:loading.flex class="absolute inset-0 z-10 items-center justify-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-[1px]">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-circle-notch animate-spin text-4xl text-blue-600 mb-2"></i>
                            <span class="text-sm font-bold text-blue-600 dark:text-blue-400 uppercase tracking-widest">Sinkronisasi...</span>
                        </div>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-bold text-center w-20">NO</th>
                                <th scope="col" wire:click="sortBy('no_tiket')" class="px-6 py-4 font-bold cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                    <div class="flex items-center justify-center">
                                        TIKET
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'no_tiket' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'no_tiket' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('created_at')" class="px-6 py-4 font-bold cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                    <div class="flex items-center">
                                        TANGGAL
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'created_at' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'created_at' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" wire:click="sortBy('opd')" class="px-6 py-4 font-bold cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                    <div class="flex items-center">
                                        OPD
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'opd' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'opd' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 font-bold uppercase tracking-wider">Pelapor/Uraian</th>
                                <th scope="col" wire:click="sortBy('status_laporan')" class="px-6 py-4 font-bold text-center cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                    <div class="flex items-center justify-center">
                                        STATUS
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'status_laporan' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'status_laporan' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                            <!-- Skeleton Rows while loading -->
                            @for ($i = 0; $i < $perPage; $i++)
                                <tr wire:loading class="animate-pulse">
                                    <td class="px-6 py-4 text-center"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-8 mx-auto"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded w-16 mx-auto"></div></td>
                                    <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-20 mb-1"></div><div class="h-3 bg-gray-100 dark:bg-gray-800 rounded w-12"></div></td>
                                    <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-24"></div></td>
                                    <td class="px-6 py-4"><div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32 mb-1"></div><div class="h-3 bg-gray-100 dark:bg-gray-800 rounded w-48"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-24 mx-auto"></div></td>
                                </tr>
                            @endfor

                            @forelse($laporans as $index => $lapor)
                                <tr wire:loading.remove wire:key="lapor-{{ $lapor->id }}" class="hover:bg-blue-50/50 dark:hover:bg-blue-900/10 transition-colors duration-150 group">
                                    <td class="px-6 py-4 text-center font-bold text-gray-400 group-hover:text-blue-600 transition-colors duration-200">
                                        {{ $laporans->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs font-mono font-black rounded border border-gray-200 dark:border-gray-600 tracking-tighter">
                                            {{ $lapor->no_tiket }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-xs font-bold text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($lapor->tgl_laporan)->format('d M Y') }}</div>
                                        <div class="text-[10px] text-gray-400">{{ \Carbon\Carbon::parse($lapor->tgl_laporan)->format('H:i') }} WIB</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-xs font-black text-blue-700 dark:text-blue-400 uppercase leading-none mb-1">{{ $lapor->opd->nama ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-gray-900 dark:text-white tracking-tight mb-1">{{ $lapor->nama_pelapor }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1 italic max-w-xs">{{ $lapor->uraian_laporan }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $st = strtolower($lapor->status_laporan ? $lapor->status_laporan->value : 'unknown');
                                            $badgeClass = match(true) {
                                                str_contains($st, 'belum') => 'bg-red-100 text-red-800 border-red-200',
                                                str_contains($st, 'sedang') => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                str_contains($st, 'selesai') => 'bg-green-100 text-green-800 border-green-200',
                                                default => 'bg-gray-100 text-gray-800 border-gray-200'
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black border uppercase tracking-widest leading-none {{ $badgeClass }}">
                                            {{ $lapor->status_laporan ? $lapor->status_laporan->getLabel() : 'N/A' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr wire:loading.remove>
                                    <td colspan="6" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <i class="fas fa-clipboard-list text-6xl mb-4 opacity-10"></i>
                                            <p class="text-xl font-bold tracking-tighter uppercase text-gray-900 dark:text-gray-100">Data Laporan Nihil</p>
                                            <p class="text-sm italic font-medium">Coba sesuaikan kata kunci atau filter Anda.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- DataTables Footer Controls -->
                <div class="mt-8 flex flex-col md:flex-row justify-between items-center gap-6 bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">
                        Menampilkan <span class="text-gray-900 dark:text-white font-bold">{{ $laporans->firstItem() ?? 0 }}</span> - <span class="text-gray-900 dark:text-white font-bold">{{ $laporans->lastItem() ?? 0 }}</span> dari total <span class="text-gray-900 dark:text-white font-bold">{{ $totalLaporan }}</span> entri data
                    </div>
                    <div class="pagination-wrapper">
                        {{ $laporans->links('vendor.livewire.custom-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
