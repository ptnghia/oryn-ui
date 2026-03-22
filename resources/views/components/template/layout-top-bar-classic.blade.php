{{-- TopBarClassic Layout: Horizontal top navigation, no sidebar --}}
<x-oryn-layout-base type="topBarClassic" {{ $attributes->merge(['class' => 'flex flex-auto flex-col min-h-screen']) }}>
    <div class="flex flex-auto min-w-0">
        <div class="flex flex-col flex-auto min-h-screen min-w-0 relative w-full">
            {{ $header ?? '' }}
            <div class="h-full flex flex-auto flex-col">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-oryn-layout-base>
