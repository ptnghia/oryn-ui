{{-- Scrum Board Block --}}
{{-- Usage: <x-oryn-block-app-scrum-board> ... columns ... </x-oryn-block-app-scrum-board> --}}
@props([
    'title' => '',
    'subtitle' => '',
])

<x-oryn-card {{ $attributes->merge(['class' => 'h-full']) }}>
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-6">
        <div>
            @if($title)
                <h3 class="text-lg font-semibold">{{ $title }}</h3>
            @endif
            @if($subtitle)
                <p class="text-gray-500 mt-1">{{ $subtitle }}</p>
            @endif
        </div>
        @if(isset($headerActions))
            <div class="flex items-center gap-2">
                {{ $headerActions }}
            </div>
        @endif
    </div>

    {{-- Board columns (horizontal scroll) --}}
    <div class="flex overflow-x-auto gap-4 pb-4">
        {{ $slot }}
    </div>
</x-oryn-card>
