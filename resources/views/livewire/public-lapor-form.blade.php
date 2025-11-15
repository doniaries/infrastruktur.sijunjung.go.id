<div>
    <section class="min-h-screen flex items-center justify-center dark:bg-dark">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center mt-6 mb-6">
                <h1 class="text-3xl text-center font-extrabold text-gray-800 dark:text-white">Form Laporan Infrastruktur
                </h1>
            </div>
            <div
                class="overflow-x-auto rounded-lg shadow-lg bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm p-6 border border-gray-200 dark:border-gray-700 mb-6 form-container w-full max-w-2xl mx-auto">
                <form wire:submit.prevent="submit" class="space-y-6">
                    <div class="w-full max-w-2xl mx-auto">
                        {{ $this->form }}
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4 justify-center">
                        <a href="{{ url('/') }}" class="px-6 py-3 text-center rounded-lg form-button form-button-back">Kembali</a>
                        <button type="submit" class="px-6 py-3 rounded-lg form-button form-button-submit glow-on-hover ripple">Kirim Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
