{{-- Activity Log Block --}}
{{-- Usage: <x-oryn-block-account-activity-log> ... timeline ... </x-oryn-block-account-activity-log> --}}
@props([
    'title' => 'Activity log',
])

<x-oryn-card {{ $attributes->merge(['class' => 'h-full']) }}>
    <div class="max-w-[800px] mx-auto h-full">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-6">
            <h3 class="text-lg font-semibold">{{ $title }}</h3>
            @if(isset($actions))
                <div class="flex items-center gap-2">
                    {{ $actions }}
                </div>
            @endif
        </div>

        {{-- Timeline content --}}
        {{ $slot }}

        {{-- Load more (optional) --}}
        @if(isset($loadMore))
            <div class="mt-6 text-center">
                {{ $loadMore }}
            </div>
        @endif
    </div>
</x-oryn-card>
