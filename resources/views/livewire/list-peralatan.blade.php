<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Title Section -->
                <div class="flex justify-center mb-8">
                    <div class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-black rounded-xl shadow-xl transform hover:scale-105 transition-all duration-300 border border-blue-800/20"
                         style="background: linear-gradient(to right, #2563eb, #4338ca);">
                        <i class="fas fa-cube mr-3 text-xl text-white"></i>
                        <h2 class="text-2xl uppercase tracking-wider text-white">DATA PERALATAN</h2>
                        <span class="ml-3 px-3 py-1 bg-white/30 backdrop-blur-sm rounded-full text-sm border border-white/40 text-white font-black">{{ $totalData }}</span>
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
                            <div class="min-w-[180px]">
                                <select wire:model.live="jenisFilter" class="w-full bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                    <option value="">Semua Jenis</option>
                                    @foreach ($jenisOptions as $jenis)
                                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="relative w-full md:w-80">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama peralatan..."
                                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white sm:text-sm transition-all duration-200">
                            </div>
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
                                <th scope="col" wire:click="sortBy('nama')" class="px-6 py-4 font-bold cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                    <div class="flex items-center">
                                        NAMA PERALATAN
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'nama' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'nama' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
                                        </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 font-bold uppercase tracking-wider">Jenis Peralatan</th>
                                <th scope="col" wire:click="sortBy('tahun_pengadaan')" class="px-6 py-4 font-bold text-center cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                    <div class="flex items-center justify-center">
                                        TAHUN PENGADAAN
                                        <span class="ml-2 flex flex-col items-center">
                                            <i class="fas fa-caret-up text-[10px] {{ $sortField === 'tahun_pengadaan' && $sortDirection === 'asc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }}"></i>
                                            <i class="fas fa-caret-down text-[10px] {{ $sortField === 'tahun_pengadaan' && $sortDirection === 'desc' ? 'text-blue-600' : 'text-gray-400 opacity-50' }} -mt-1"></i>
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
                                    <td class="px-6 py-4"><div class="h-5 bg-gray-200 dark:bg-gray-700 rounded-lg w-full"></div></td>
                                    <td class="px-6 py-4"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-lg w-24"></div></td>
                                    <td class="px-6 py-4 text-center"><div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-xl w-16 mx-auto"></div></td>
                                </tr>
                            @endfor

                            @forelse($peralatans as $index => $alat)
                                <tr wire:loading.remove wire:key="alat-{{ $alat->id }}" class="hover:bg-blue-50/50 dark:hover:bg-blue-900/10 transition-colors duration-150 group">
                                    <td class="px-6 py-4 text-center font-bold text-gray-400 group-hover:text-blue-600 transition-colors duration-200">
                                        {{ $peralatans->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-900 dark:text-white uppercase tracking-tight text-sm">
                                        {{ $alat->nama }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-600 dark:text-gray-400">
                                        <span class="px-2.5 py-1 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 rounded-lg text-[11px] font-black uppercase border border-indigo-100 dark:border-indigo-800">
                                            {{ $alat->jenis_peralatan }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center justify-center px-4 py-1.5 bg-gray-50 dark:bg-gray-700/50 text-gray-900 dark:text-white text-xs font-bold rounded-xl border border-gray-200 dark:border-gray-600">
                                            {{ $alat->tahun_pengadaan }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr wire:loading.remove>
                                    <td colspan="4" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <i class="fas fa-cube text-6xl mb-4 opacity-10"></i>
                                            <p class="text-xl font-bold tracking-tighter uppercase text-gray-900 dark:text-gray-100">Data Peralatan Nihil</p>
                                            <p class="text-sm italic font-medium">Coba sesuaikan kata kunci atau filter jenis Anda.</p>
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
                        Menampilkan <span class="text-gray-900 dark:text-white font-bold">{{ $peralatans->firstItem() ?? 0 }}</span> - <span class="text-gray-900 dark:text-white font-bold">{{ $peralatans->lastItem() ?? 0 }}</span> dari total <span class="text-gray-900 dark:text-white font-bold">{{ $totalData }}</span> entri data
                    </div>
                    <div class="pagination-wrapper">
                        {{ $peralatans->links('vendor.livewire.custom-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>