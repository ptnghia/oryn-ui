{{-- Generic CRUD Detail Layout Block --}}
{{-- Usage: <x-oryn-block-crud::crud-detail> ... slots ... </x-oryn-block-crud::crud-detail> --}}
@props([
    'sidebarWidth' => '370px',
])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    <div class="flex flex-col xl:flex-row gap-4">
        {{-- Main content --}}
        <div class="gap-4 flex flex-col flex-auto">
            {{ $slot }}
        </div>

        {{-- Sidebar (optional) --}}
        @if(isset($sidebar))
            <div class="xl:min-w-[{{ $sidebarWidth }}] 2xl:w-[{{ $sidebarWidth }}] gap-4 flex flex-col">
                {{ $sidebar }}
            </div>
        @endif
    </div>
</div>
