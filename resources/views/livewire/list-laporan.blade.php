<div>
    {{-- <x-shared-header activeMenu="laporan" /> --}}
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-8 mb-6 gap-4">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-gray-800 dark:!text-white">Daftar Laporan Infrastruktur</h1>
                    <div class="flex items-center mt-1 text-sm text-gray-600 dark:text-gray-400">
                        <span class="flex items-center">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                            Total: {{ $totalLaporan }} laporan
                        </span>
                    </div>
                </div>
                <a href="{{ route('public.laporform') }}"
                    class="inline-flex items-center px-5 py-2.5 rounded-md font-semibold text-white transition-all duration-200 transform hover:scale-105 shadow-lg"
                    style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Laporan
                </a>
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
            <div
                class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-400 dark:border-gray-700 mb-6">
                <!-- Gaya tabel diimpor dari resources/css/filament.css -->
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead
                        class="bg-gradient-to-r from-blue-700 to-blue-600 dark:from-blue-800 dark:to-blue-700 shadow-md">
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
                                        class="inline-block px-2 py-1 rounded {{ $lapor->status_laporan == 'Belum Diproses' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $lapor->status_laporan }}
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
            <div class="mt-4">
                {{ $laporans->links() }}
            </div>
        </div>
    </section>
</div>
