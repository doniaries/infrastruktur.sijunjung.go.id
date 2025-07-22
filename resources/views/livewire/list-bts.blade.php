<div>
    {{-- <x-shared-header activeMenu="bts" /> --}}
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-8 mb-6 gap-4">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-gray-800 dark:!text-white">Data BTS</h1>
                    <div class="flex items-center mt-1 text-sm text-gray-600 dark:text-gray-400">
                        <span class="flex items-center">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                            Total: {{ $totalData }} data
                        </span>
                    </div>
                </div>
            </div>
            <div
                class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700 mb-6">
                {{ $this->table }}
            </div>
        </div>
    </section>
</div>
