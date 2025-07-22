<div>
    {{-- <x-shared-header activeMenu="jorong" /> --}}
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-8 mb-6 gap-4">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold text-dark dark:!text-white">Data Jorong</h1>
                    <div class="flex items-center mt-1 text-sm text-gray-600 dark:text-gray-400">
                        <span class="flex items-center">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                            Total: {{ $totalData }} data
                        </span>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('livewire:initialized', () => {
                    @this.on('notify', ({
                        type,
                        message
                    }) => {
                        window.$notify({
                            title: type === 'success' ? 'Berhasil!' : 'Perhatian!',
                            description: message,
                            icon: type === 'success' ? 'check-circle' : 'exclamation-circle',
                            iconColor: type === 'success' ? 'text-green-500' : 'text-red-500',
                            timeout: 3000,
                        });
                    });
                });
            </script>

            <div
                class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700 mb-6">
                <!-- Gaya tabel diimpor dari resources/css/filament.css -->
                {{ $this->table }}
            </div>
        </div>
    </section>
</div>
