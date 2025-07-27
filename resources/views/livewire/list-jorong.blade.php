<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex justify-between items-center mb-6">
                <div class="flex justify-center flex-1">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white font-medium rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold">Data Jorong</h2>
                        <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">{{ $totalData }}</span>
                    </div>
                </div>
                <button wire:click="exportPdf"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 hover:shadow-lg hover:scale-105 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Export PDF
                </button>
            </div>

            <!-- Search and Filter Form -->
            <div class="mb-6 flex flex-wrap gap-3 items-center max-w-4xl mx-auto">
                <div class="flex-1 min-w-64">
                    <input type="text" wire:model.live="search" placeholder="Cari jorong..."
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div class="min-w-48">
                    <select wire:model.live="nagariFilter"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Nagari</option>
                        @foreach ($nagaris as $nagari)
                            <option value="{{ $nagari->id }}">{{ $nagari->nama_nagari }}</option>
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
            </div>

            <!-- Skeleton Loading -->
            <section wire:loading
                class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden max-w-4xl mx-auto">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Jorong</th>
                                <th scope="col" class="px-4 py-3">Nagari</th>
                                <th scope="col" class="px-4 py-3">Kecamatan</th>
                                <th scope="col" class="px-4 py-3">Koordinat</th>
                                <th scope="col" class="px-4 py-3">Luas Wilayah</th>
                                <th scope="col" class="px-4 py-3">Jumlah Penduduk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                                <tr class="border-b dark:border-gray-700 animate-pulse">
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-32"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-28"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-24"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-36"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-20"></div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-16"></div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Table -->
            <section wire:loading.remove
                class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden max-w-4xl mx-auto">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Jorong</th>
                                <th scope="col" class="px-4 py-3">Nagari</th>
                                <th scope="col" class="px-4 py-3">Kecamatan</th>
                                <th scope="col" class="px-4 py-3">Kepala Jorong</th>
                                <th scope="col" class="px-4 py-3 text-right">Penduduk</th>
                                <th scope="col" class="px-4 py-3 text-right">Luas (Ha)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jorongs as $jorong)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $jorong->nama_jorong }}</td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                            {{ $jorong->nagari ? $jorong->nagari->nama_nagari : '-' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                            {{ $jorong->nagari && $jorong->nagari->kecamatan ? $jorong->nagari->kecamatan->nama : '-' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-white">
                                        {{ $jorong->nama_kepala_jorong }}</td>
                                    <td class="px-4 py-3 text-right text-gray-900 dark:text-white">
                                        {{ number_format($jorong->jumlah_penduduk_jorong, 0, ',', '.') }} Jiwa</td>
                                    <td class="px-4 py-3 text-right text-gray-900 dark:text-white">
                                        {{ number_format($jorong->luas_jorong, 0, ',', '.') }} Ha</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-12 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 mb-4 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <p class="text-lg font-medium">Belum Ada Data</p>
                                            <p class="text-sm">Data jorong belum tersedia atau tidak ditemukan</p>
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
                class="mt-6 bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden max-w-4xl mx-auto">
                {{ $jorongs->links('vendor.livewire.custom-pagination') }}
            </div>
        </div>
    </div>
</div>
