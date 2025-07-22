<div>
    {{-- <x-shared-header activeMenu="" /> --}}
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-8 mb-6">
                <h1 class="text-2xl text-center font-bold text-gray-800 dark:text-white">
                    {{ $this->nagariId ? 'Edit Data Nagari' : 'Form Data Nagari' }}
                </h1>
            </div>
            <div
                class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700 mb-6 form-container">
                <form wire:submit.prevent="submit" class="space-y-6">
                    {{ $this->form }}
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ url('/') }}"
                            class="px-6 py-3 text-center rounded-lg form-button form-button-back">Kembali</a>
                        <button type="submit" class="px-6 py-3 rounded-lg form-button form-button-submit">
                            {{ $this->nagariId ? 'Update Data Nagari' : 'Kirim Data Nagari' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
