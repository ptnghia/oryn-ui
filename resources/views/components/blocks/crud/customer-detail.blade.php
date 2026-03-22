{{-- Customer Detail Block --}}
{{-- Usage: <x-oryn-block-crud-customer-detail> ... content cards ... </x-oryn-block-crud-customer-detail> --}}
@props([
    'editUrl' => '',
    'deleteUrl' => '',
])

<x-oryn-block-crud::crud-detail sidebarWidth="370px" {{ $attributes }}>
    {{-- Main content: profile info, orders, activity, etc. --}}
    {{ $slot }}

    @if(isset($sidebar))
        <x-slot:sidebar>
            {{-- Sidebar: Profile card, quick actions, etc. --}}
            {{ $sidebar }}
        </x-slot:sidebar>
    @endif
</x-oryn-block-crud::crud-detail>
