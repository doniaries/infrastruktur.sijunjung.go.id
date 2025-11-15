<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex justify-center mb-6">
                <div class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                    <i class="fas fa-folder-open mr-2"></i>
                    <h2 class="text-xl font-bold">DATA INVENTARIS</h2>
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $totalData }}</span>
                </div>
            </div>

            <div class="mb-6 flex flex-wrap gap-3 items-center max-w-6xl mx-auto">
                <div class="flex-1 min-w-64 relative">
                    <input type="text" wire:model.live="search" placeholder="Cari inventaris..."
                           class="w-full pl-10 pr-8 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    @if ($search)
                        <button type="button" wire:click="$set('search', '')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>

                <div class="min-w-48">
                    <select wire:model.live="opdFilter"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua OPD</option>
                        @foreach ($opds as $opd)
                            <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-48">
                    <select wire:model.live="peralatanFilter"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Peralatan</option>
                        @foreach ($peralatans as $alat)
                            <option value="{{ $alat->id }}">{{ $alat->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto max-w-6xl mx-auto" wire:loading.remove>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="px-4 py-3 w-12">No</th>
                            <th scope="col" class="px-4 py-3">
                                <button wire:click="sortBy('opd')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                    <span>OPD</span>
                                </button>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <button wire:click="sortBy('peralatan')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                    <span>Peralatan</span>
                                </button>
                            </th>
                            <th scope="col" class="px-4 py-3">Jenis</th>
                            <th scope="col" class="px-4 py-3">
                                <button wire:click="sortBy('jumlah')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                    <span>Jumlah</span>
                                </button>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <button wire:click="sortBy('status')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                    <span>Status</span>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inventaris as $index => $item)
                            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-300">
                                <td class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">{{ $inventaris->firstItem() + $index }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $item->opd?->nama ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $item->peralatan?->nama ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $item->jenis_peralatan }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $item->jumlah }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $item->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">Belum ada data inventaris</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $inventaris->links('vendor.livewire.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>