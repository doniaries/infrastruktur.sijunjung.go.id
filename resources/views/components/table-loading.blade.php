<!-- Global Table Loading Component -->
<div wire:loading {{ $attributes->merge(['class' => 'flex justify-center items-center py-16']) }}>
    <div class="bg-white dark:bg-gray-800 rounded-lg p-8 shadow-xl max-w-sm mx-4 border border-gray-200 dark:border-gray-700">
        <div class="flex flex-col items-center space-y-4">
            <!-- Spinner -->
            <svg class="animate-spin h-12 w-12 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            
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
            @if($showProgress ?? false)
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full animate-pulse" style="width: 60%"></div>
            </div>
            @endif
        </div>
    </div>
</div>