<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex justify-center mb-6">
                <div
                    class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                    <h2 class="text-xl font-bold">Data BTS</h2>
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $totalData }}</span>
                </div>
            </div>

            <!-- Search, Filter and Export Section -->
            <div class="mb-6 flex flex-wrap gap-3 items-center max-w-5xl mx-auto">
                <div class="flex-1 min-w-48">
                    <input type="text" wire:model.live="search" placeholder="Cari BTS..."
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div class="min-w-48">
                    <select wire:model.live="operatorFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Operator</option>
                        @foreach ($operators as $operator)
                            <option value="{{ $operator->id }}">{{ $operator->nama_operator }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-48">
                    <select wire:model.live="kecamatanFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Kecamatan</option>
                        @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-48">
                    <select wire:model.live="teknologiFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Teknologi</option>
                        <option value="2G">2G</option>
                        <option value="3G">3G</option>
                        <option value="4G">4G</option>
                        <option value="4G+5G">4G+5G</option>
                        <option value="5G">5G</option>
                    </select>
                </div>
                <div class="min-w-48">
                    <select wire:model.live="statusFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Non-Aktif</option>
                    </select>
                </div>
                <button wire:click="exportPdf"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 hover:shadow-lg hover:scale-105 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform min-w-fit btn-export-enhanced ripple glow-on-hover">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Export PDF
                </button>
            </div>

            <!-- Skeleton Loading Section -->
            <section
                class="bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-5xl mx-auto"
                wire:loading>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('operator')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Operator</span>
                                        @if($sortField === 'operator')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('kecamatan')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Kecamatan</span>
                                        @if($sortField === 'kecamatan')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('nagari')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Nagari</span>
                                        @if($sortField === 'nagari')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">Koordinat</th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('alamat')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Alamat</span>
                                        @if($sortField === 'alamat')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('teknologi')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Teknologi</span>
                                        @if($sortField === 'teknologi')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('status')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Status</span>
                                        @if($sortField === 'status')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('tahun_bangun')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Tahun Bangun</span>
                                        @if($sortField === 'tahun_bangun')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                                <tr class="animate-pulse border-b dark:border-gray-700">
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 dark:bg-gray-600 rounded w-20"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 dark:bg-gray-600 rounded w-24"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 dark:bg-gray-600 rounded w-32"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 dark:bg-gray-600 rounded w-40"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 dark:bg-gray-600 rounded w-48"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 dark:bg-gray-600 rounded w-16"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 dark:bg-gray-600 rounded w-16"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 dark:bg-gray-600 rounded w-16"></div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Table Section -->
            <section
                class="bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-5xl mx-auto"
                wire:loading.remove>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('operator')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Operator</span>
                                        @if($sortField === 'operator')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('kecamatan')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Kecamatan</span>
                                        @if($sortField === 'kecamatan')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('nagari')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Nagari</span>
                                        @if($sortField === 'nagari')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">Koordinat</th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('alamat')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Alamat</span>
                                        @if($sortField === 'alamat')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('teknologi')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Teknologi</span>
                                        @if($sortField === 'teknologi')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('status')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Status</span>
                                        @if($sortField === 'status')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('tahun_bangun')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Tahun Bangun</span>
                                        @if($sortField === 'tahun_bangun')
                                            @if($sortDirection === 'asc')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                                </svg>
                                            @endif
                                        @else
                                            <svg class="w-3 h-3 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                            </svg>
                                        @endif
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bts as $item)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if ($item->operator && $item->operator->nama_operator == 'TELKOMSEL')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                {{ $item->operator->nama_operator }}
                                            </span>
                                        @elseif($item->operator && $item->operator->nama_operator == 'INDOSAT')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                                {{ $item->operator->nama_operator }}
                                            </span>
                                        @elseif($item->operator && $item->operator->nama_operator == 'XL AXIATA')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ $item->operator->nama_operator }}
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                                {{ $item->operator ? $item->operator->nama_operator : 'Tidak Diketahui' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            {{ $item->kecamatan ? $item->kecamatan->nama : '-' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $item->nagari ? $item->nagari->nama_nagari : '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $item->titik_koordinat }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100 max-w-xs truncate">
                                        {{ $item->alamat }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if ($item->teknologi == '2G')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                                {{ $item->teknologi }}
                                            </span>
                                        @elseif($item->teknologi == '3G')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ $item->teknologi }}
                                            </span>
                                        @elseif($item->teknologi == '4G')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                {{ $item->teknologi }}
                                            </span>
                                        @elseif($item->teknologi == '4G+5G')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-cyan-100 text-cyan-800 dark:bg-cyan-900 dark:text-cyan-200">
                                                {{ $item->teknologi }}
                                            </span>
                                        @elseif($item->teknologi == '5G')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                                {{ $item->teknologi }}
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                                {{ $item->teknologi }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if ($item->status == 'aktif')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $item->tahun_bangun }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8"
                                        class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 mb-4 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                                                </path>
                                            </svg>
                                            <p class="text-lg font-medium">Belum Ada Data</p>
                                            <p class="text-sm">Data BTS belum tersedia atau tidak ditemukan</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Pagination -->
            <div
                class="mt-6 bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-5xl mx-auto">
                {{ $bts->links('vendor.livewire.custom-pagination') }}
            </div>
        </div>
    </div>
    

</div>
