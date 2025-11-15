<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex justify-center mb-6">
                <div class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                    <i class="fas fa-building mr-2"></i>
                    <h2 class="text-xl font-bold">DATA OPD</h2>
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $totalData }}</span>
                </div>
            </div>

            <div class="mb-6 flex flex-wrap gap-3 items-center max-w-4xl mx-auto">
                <div class="flex-1 min-w-64 relative">
                    <input type="text" wire:model.live="search" placeholder="Cari OPD..."
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
            </div>

            <div class="overflow-x-auto max-w-4xl mx-auto" wire:loading.remove>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="px-4 py-3 w-12">No</th>
                            <th scope="col" class="px-4 py-3">
                                <button wire:click="sortBy('nama')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                    <span>Nama OPD</span>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($opds as $index => $opd)
                            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-300">
                                <td class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">{{ $opds->firstItem() + $index }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $opd->nama }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">Belum ada data OPD</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $opds->links('vendor.livewire.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>