<!-- Global Table Loading Component -->
<div wire:loading {{ $attributes->merge(['class' => 'flex justify-center items-center py-16']) }}>
    <div
        class="bg-white dark:bg-gray-800 rounded-lg p-8 shadow-xl max-w-sm mx-4 border border-gray-200 dark:border-gray-700">
        <div class="flex flex-col items-center space-y-4">
            <!-- Flux Icon Bolt -->
             <flux:icon.bolt variant="solid" class="text-amber-500 dark:text-amber-300 h-12 w-12" />
            <!-- Loading Text -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                    {{ $title ?? 'Memuat Data' }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ $message ?? 'Mohon tunggu sebentar...' }}
                </p>
            </div>

            <!-- Progress Bar (Optional) -->
            @if ($showProgress ?? false)
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full animate-pulse" style="width: 60%"></div>
                </div>
            @endif
        </div>
    </div>
</div>
