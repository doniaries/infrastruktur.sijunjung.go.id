<div class="relative w-full max-w-2xl mx-auto">
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
        </div>
        <input 
            type="text" 
            wire:model.debounce.300ms="query"
            wire:keydown.arrow-down="highlightIndex = Math.min(highlightIndex + 1, results.length - 1)"
            wire:keydown.arrow-up="highlightIndex = Math.max(highlightIndex - 1, 0)"
            wire:keydown.enter="selectResult()"
            class="w-full pl-10 pr-4 py-3 text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Cari laporan, No. Tiket, atau Nama Pelapor..."
            autocomplete="off"
        >
        @if($query)
            <button wire:click="resetSearch" class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fas fa-times text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"></i>
            </button>
        @endif
    </div>

    @if($showResults && count($results) > 0)
        <div class="absolute z-50 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-700 dark:border-gray-600">
            <div class="py-2">
                @foreach($results as $index => $result)
                    <a 
                        href="{{ route('list.laporan', ['ticket' => $result['no_tiket']]) }}"
                        class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 {{ $highlightIndex === $index ? 'bg-gray-100 dark:bg-gray-600' : '' }}"
                        wire:key="result-{{ $result['id'] }}"
                    >
                        <div class="font-medium">{{ $result['judul'] }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
<div class="mt-1">No. Tiket: <span class="font-medium">{{ $result['no_tiket'] }}</span></div>
                            <div>Pelapor: <span class="font-medium">{{ $result['nama_pelapor'] }}</span></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @elseif($showResults && $query && strlen($query) > 2)
        <div class="absolute z-50 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-4 text-sm text-center text-gray-500 dark:text-gray-300">
                <i class="fas fa-search mr-2"></i>
                Tidak ditemukan laporan yang sesuai dengan pencarian "<span class="font-medium">{{ $query }}</span>"
            </div>
        </div>
    @endif
</div>
