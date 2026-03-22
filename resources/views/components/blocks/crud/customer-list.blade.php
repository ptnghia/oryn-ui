{{-- Customer List Block --}}
{{-- Usage: <x-oryn-block-crud-customer-list> <x-slot:table>...</x-slot:table> </x-oryn-block-crud-customer-list> --}}
@props([
    'title' => 'Customers',
    'createUrl' => '',
])

<x-oryn-block-crud::crud-list :title="$title" {{ $attributes }}>
    <x-slot:actions>
        @if(isset($actions))
            {{ $actions }}
        @else
            @if($createUrl)
                <a href="{{ $createUrl }}">
                    <x-oryn-button variant="solid" size="sm">
                        <span class="flex items-center gap-1">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            Add New
                        </span>
                    </x-oryn-button>
                </a>
            @endif
        @endif
    </x-slot:actions>

    <x-slot:tools>
        @if(isset($tools))
            {{ $tools }}
        @endif
    </x-slot:tools>

    {{-- Table content --}}
    {{ $slot }}

    @if(isset($selected))
        <x-slot:selected>{{ $selected }}</x-slot:selected>
    @endif
</x-oryn-block-crud::crud-list>
