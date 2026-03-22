{{-- Project List Block --}}
{{-- Usage: <x-oryn-block-app-project-list> ... project cards ... </x-oryn-block-app-project-list> --}}
@props([
    'title' => 'Projects',
    'createLabel' => 'Create project',
])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-6">
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
        @if(isset($headerActions))
            <div class="flex items-center gap-2">
                {{ $headerActions }}
            </div>
        @endif
    </div>

    {{-- Favorites section --}}
    @if(isset($favorites))
        <div class="mt-4">
            <h5 class="text-base font-semibold mb-4">Favorite</h5>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                {{ $favorites }}
            </div>
        </div>
    @endif

    {{-- Main project listing --}}
    <div class="mt-8">
        @if(isset($sectionTitle))
            <h5 class="text-base font-semibold mb-4">{{ $sectionTitle }}</h5>
        @endif
        {{ $slot }}
    </div>
</div>
