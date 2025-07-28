<div class="animate-pulse">
    @for($i = 0; $i < $count; $i++)
        <div class="flex items-center space-x-4 mb-4">
            <div class="rounded-full bg-gray-300 h-10 w-10"></div>
            <div class="flex-1 space-y-2">
                <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                <div class="h-4 bg-gray-300 rounded w-1/2"></div>
            </div>
        </div>
    @endfor
</div>