{{-- Order Detail Block --}}
{{-- Usage: <x-oryn-block-crud-order-detail> ... content cards ... </x-oryn-block-crud-order-detail> --}}
@props([
    'editUrl' => '',
])

<x-oryn-block-crud::crud-detail sidebarWidth="370px" {{ $attributes }}>
    {{-- Main content: order items, payment info, shipping, etc. --}}
    {{ $slot }}

    @if(isset($sidebar))
        <x-slot:sidebar>
            {{-- Sidebar: Order summary, customer info, etc. --}}
            {{ $sidebar }}
        </x-slot:sidebar>
    @endif
</x-oryn-block-crud::crud-detail>
