{{-- CollapsibleSide Layout: Sidebar + Header + Content --}}
<x-oryn-layout-base type="collapsibleSide" {{ $attributes->merge(['class' => 'flex flex-auto flex-col']) }}>
    <div class="flex flex-auto min-w-0">
        {{ $sideNav ?? '' }}
        <div class="flex flex-col flex-auto min-h-screen min-w-0 relative w-full">
            {{ $header ?? '' }}
            <div class="h-full flex flex-auto flex-col">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-oryn-layout-base>
