{{-- Help Center Manage Articles Block --}}
{{-- Usage: <x-oryn-block-help-manage-articles> ... article table ... </x-oryn-block-help-manage-articles> --}}
@props([
    'title' => 'Manage Articles',
])

<x-oryn-block-crud::crud-list :title="$title" {{ $attributes }}>
    <x-slot:actions>
        @if(isset($actions))
            {{ $actions }}
        @endif
    </x-slot:actions>

    <x-slot:tools>
        @if(isset($tools))
            {{ $tools }}
        @endif
    </x-slot:tools>

    {{ $slot }}

    @if(isset($selected))
        <x-slot:selected>{{ $selected }}</x-slot:selected>
    @endif
</x-oryn-block-crud::crud-list>
