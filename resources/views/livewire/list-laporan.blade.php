<div>
    {{-- <x-shared-header activeMenu="laporan" /> --}}
    <!-- Header Section -->
    <div class="page-header">
        <div class="container mx-auto px-4">
            <div class="page-header-content flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="page-header-icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="page-header-title">Daftar Laporan Infrastruktur</h1>
                        <p class="page-header-subtitle">Kelola dan pantau laporan infrastruktur di Kabupaten Sijunjung</p>
                    </div>
                </div>
                <div class="hidden md:flex page-header-stats">
                    <div class="page-header-stat-card">
                        <div class="page-header-stat-number">{{ $totalLaporan }}</div>
                        <div class="page-header-stat-label">Total Laporan</div>
                    </div>
                    <a href="{{ route('public.laporform') }}"
                        class="inline-flex items-center px-5 py-2.5 rounded-md font-semibold text-white transition-all duration-200 transform hover:scale-105 shadow-lg"
                        style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="page-section">
        <div class="container px-4 mx-auto">

            <!-- Form Pencarian dan Filter -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 mb-6 border border-gray-400 dark:border-gray-700">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-1"></i> Pencarian
                        </label>
                        <input type="text" wire:model.live="search" id="search"
                            placeholder="Cari berdasarkan No Tiket, Nama Pelapor, OPD, atau Uraian..."
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    </div>
                    {{-- <div class="md:w-64">
                        <label for="statusFilter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-filter mr-1"></i> Filter Status
                        </label>
                        <select wire:model.live="statusFilter"
                                id="statusFilter"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Semua Status</option>
                            <option value="Belum Diproses">Belum Diproses</option>
                            <option value="Sedang Diproses">Sedang Diproses</option>
                            <option value="Selesai Diproses">Selesai Diproses</option>
                        </select>
                    </div>
                    @if ($search || $statusFilter)
                        <div class="flex items-end">
                            <button wire:click="$set('search', ''); $set('statusFilter', '')"
                                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md transition-colors duration-200">
                                <i class="fas fa-times mr-1"></i> Reset
                            </button>
                        </div>
                    @endif --}}
                </div>
            </div>
            <style>
                .btn-tambah-laporan {
                    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
                    transition: all 0.3s ease;
                }

                .btn-tambah-laporan:hover {
                    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
                    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
                    transform: translateY(-1px);
                }

                .btn-tambah-laporan:active {
                    transform: translateY(0);
                }
            </style>
        </div>
        <div class="table-container">
            <div class="table-content">
                <div class="table-wrapper">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gradient-to-r from-blue-700 to-blue-600 dark:from-blue-800 dark:to-blue-700 shadow-md">
                            <tr class="text-white dark:!text-white">
                                <th class="px-4 py-3 text-left text-sm font-bold tracking-wide">No Tiket</th>
                                <th class="px-4 py-3 text-left text-sm font-bold tracking-wide">Tgl Laporan</th>
                                <th class="px-4 py-3 text-left text-sm font-bold tracking-wide">Nama OPD</th>
                                <th class="px-4 py-3 text-left text-sm font-bold tracking-wide">Nama Pelapor</th>
                                <th class="px-4 py-3 text-left text-sm font-bold tracking-wide">Uraian Laporan</th>
                                <th class="px-4 py-3 text-left text-sm font-bold tracking-wide">Status Laporan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($laporans as $lapor)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $lapor->no_tiket }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $lapor->tgl_laporan }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $lapor->opd->nama ?? '-' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $lapor->nama_pelapor }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $lapor->uraian_laporan }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                <span
                                    class="status-badge {{ $lapor->status_laporan->getCssClass() }} inline-block px-3 py-1 rounded-full text-xs font-semibold"
                                    style="background-color: {{ $lapor->status_laporan->getBackgroundColor() }}; color: {{ $lapor->status_laporan->getTextColor() }}; border: 1px solid {{ $lapor->status_laporan->getBorderColor() }};">
                                    {{ $lapor->status_laporan->getLabel() }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">Belum
                                ada data laporan.</td>
                        </tr>
                    @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            {{ $laporans->links() }}
        </div>
</div>
</section>
</div>
