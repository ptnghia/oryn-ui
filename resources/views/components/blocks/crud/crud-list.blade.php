{{-- Generic CRUD List Layout Block --}}
{{-- Usage: <x-oryn-block-crud::crud-list title="Customers"> ... slots ... </x-oryn-block-crud::crud-list> --}}
@props([
    'title' => '',
])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    <x-oryn-card>
        <div class="flex flex-col gap-4">
            {{-- Header row: title + action buttons --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                @if($title)
                    <h3 class="text-lg font-semibold">{{ $title }}</h3>
                @endif
                @if(isset($actions))
                    <div class="flex items-center gap-2">
                        {{ $actions }}
                    </div>
                @endif
            </div>

            {{-- Table tools: search + filters --}}
            @if(isset($tools))
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                    {{ $tools }}
                </div>
            @endif

            {{-- Table --}}
            {{ $slot }}
        </div>
    </x-oryn-card>

    {{-- Bulk selection bar (optional) --}}
    @if(isset($selected))
        {{ $selected }}
    @endif
</div>
