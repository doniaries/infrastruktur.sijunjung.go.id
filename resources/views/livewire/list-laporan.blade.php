<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- Title Section -->
            <div class="flex justify-center mb-6">
                <div
                    class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                    <h2 class="text-xl font-bold">Daftar Laporan</h2>
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $totalLaporan }}</span>
                </div>
            </div>

            <!-- Search, Filter and Action Section -->
            <div class="mb-6 flex flex-wrap gap-3 items-center max-w-6xl mx-auto">
                <div class="flex-1 min-w-64">
                    <input type="text" wire:model.live="search" placeholder="Cari laporan..."
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div class="min-w-48">
                    <select wire:model.live="statusFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="Belum Diproses">Belum Diproses</option>
                        <option value="Sedang Diproses">Sedang Diproses</option>
                        <option value="Selesai Diproses">Selesai Diproses</option>
                    </select>
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
                <a href="{{ route('public.laporform') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors duration-200 min-w-fit btn-primary-enhanced ripple glow-on-hover">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Laporan
                </a>
            </div>
            <!-- Table Section -->
            <section
                class="bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-6xl mx-auto">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    <button wire:click="sortBy('no_tiket')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>No Tiket</span>
                                        @if($sortField === 'no_tiket')
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
                                    <button wire:click="sortBy('created_at')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Tanggal</span>
                                        @if($sortField === 'created_at')
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
                                    <button wire:click="sortBy('opd')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>OPD</span>
                                        @if($sortField === 'opd')
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
                                    <button wire:click="sortBy('nama_pelapor')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Pelapor</span>
                                        @if($sortField === 'nama_pelapor')
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
                                    <button wire:click="sortBy('uraian_laporan')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Uraian</span>
                                        @if($sortField === 'uraian_laporan')
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
                                    <button wire:click="sortBy('status_laporan')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Status</span>
                                        @if($sortField === 'status_laporan')
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
                                    <button wire:click="sortBy('keterangan_petugas')" class="flex items-center space-x-1 hover:text-blue-600 dark:hover:text-blue-400">
                                        <span>Keterangan</span>
                                        @if($sortField === 'keterangan_petugas')
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
                            @forelse($laporans as $lapor)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 font-mono">
                                            {{ $lapor->no_tiket }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            {{ \Carbon\Carbon::parse($lapor->tgl_laporan)->format('d/m/Y H:i') }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $lapor->opd->nama ?? '-' }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $lapor->nama_pelapor }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $lapor->uraian_laporan }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if ($lapor->status_laporan && $lapor->status_laporan->value == 'Belum Diproses')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                {{ $lapor->status_laporan->getLabel() }}
                                            </span>
                                        @elseif($lapor->status_laporan && $lapor->status_laporan->value == 'Sedang Diproses')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                                {{ $lapor->status_laporan->getLabel() }}
                                            </span>
                                        @elseif($lapor->status_laporan && $lapor->status_laporan->value == 'Selesai Diproses')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                {{ $lapor->status_laporan->getLabel() }}
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                                {{ $lapor->status_laporan ? $lapor->status_laporan->getLabel() : 'Tidak Diketahui' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $lapor->keterangan_petugas ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 mb-4 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <p class="text-lg font-medium">Belum Ada Data</p>
                                            <p class="text-sm">Data laporan belum tersedia atau tidak ditemukan</p>
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
                class="mt-6 bg-gray-100 dark:bg-gray-900 relative shadow-md sm:rounded-lg overflow-hidden max-w-6xl mx-auto">
                {{ $laporans->links('vendor.livewire.custom-pagination') }}
            </div>
        </div>
    </div>
    

</div>
