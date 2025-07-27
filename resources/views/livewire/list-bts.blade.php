<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Data BTS</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Total: {{ $totalData }} BTS</p>
                </div>
            </div>

            <!-- Search and Filter Form -->
            <div class="mb-6 flex flex-wrap gap-3 items-center">
                <div class="flex-1 min-w-[200px]">
                    <input type="text" wire:model.live="search" placeholder="Cari BTS..." 
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div class="min-w-[140px]">
                    <select wire:model.live="operatorFilter" 
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Operator</option>
                        @foreach($operators as $operator)
                            <option value="{{ $operator->id }}">{{ $operator->nama_operator }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-[140px]">
                    <select wire:model.live="kecamatanFilter" 
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Kecamatan</option>
                        @foreach($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-[120px]">
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
                <div class="min-w-[120px]">
                    <select wire:model.live="statusFilter" 
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Non-Aktif</option>
                    </select>
                </div>
                <div class="min-w-[120px]">
                    <button wire:click="exportPdf" 
                            class="w-full px-4 py-2 bg-green-600 hover:bg-green-700 hover:shadow-lg hover:scale-105 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export PDF
                    </button>
                </div>
            </div>

            <!-- Skeleton Loading -->
            <div wire:loading class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Operator</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Kecamatan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nagari</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Koordinat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Teknologi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tahun Bangun</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @for($i = 0; $i < 10; $i++)
                            <tr class="animate-pulse">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-20"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-24"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-28"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-40"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-16"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-6 bg-gray-200 dark:bg-gray-700 rounded-full w-16"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-16"></div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto" wire:loading.remove>
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Operator</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Kecamatan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nagari</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Koordinat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Teknologi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tahun Bangun</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($bts as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($item->operator && $item->operator->nama_operator == 'TELKOMSEL') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                        @elseif($item->operator && $item->operator->nama_operator == 'INDOSAT') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                        @elseif($item->operator && $item->operator->nama_operator == 'XL AXIATA') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200
                                        @endif">
                                        {{ $item->operator ? $item->operator->nama_operator : 'Tidak Diketahui' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $item->kecamatan ? $item->kecamatan->nama : '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $item->nagari ? $item->nagari->nama_nagari : '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 font-mono">{{ $item->titik_koordinat }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100 max-w-xs truncate">{{ $item->alamat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($item->teknologi == '2G') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                        @elseif($item->teknologi == '3G') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                        @elseif($item->teknologi == '4G') bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200
                                        @elseif($item->teknologi == '4G+5G') bg-cyan-100 text-cyan-800 dark:bg-cyan-900 dark:text-cyan-200
                                        @elseif($item->teknologi == '5G') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200
                                        @endif">
                                        {{ $item->teknologi }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($item->status == 'aktif') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                        @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $item->tahun_bangun }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
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

            <!-- Pagination -->
            <div class="mt-6">
                {{ $bts->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notification', (event) => {
                const data = event[0];
                if (data.type === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else if (data.type === 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message,
                        showConfirmButton: true
                    });
                }
            });
        });
    </script>
</div>
