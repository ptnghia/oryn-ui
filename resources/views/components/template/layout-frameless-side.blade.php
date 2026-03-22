{{-- FramelessSide Layout: Dark background with floating content card --}}
<x-oryn-layout-base type="framelessSide" :adaptive-card-active="true" {{ $attributes->merge(['class' => 'flex flex-auto flex-col bg-gray-950']) }}>
    <div class="flex flex-auto min-w-0">
        {{ $sideNav ?? '' }}
        <div class="p-6 min-h-screen min-w-0 relative w-full">
            <div class="bg-white dark:bg-gray-900 flex flex-col flex-1 h-full rounded-2xl">
                {{ $header ?? '' }}
                <div class="h-full flex flex-auto flex-col">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-oryn-layout-base>
