{{-- Order Edit Block --}}
{{-- Usage: <x-oryn-block-crud-order-edit action="/orders/1"> ... form sections ... </x-oryn-block-crud-order-edit> --}}
@props([
    'action' => '',
    'discardUrl' => '',
])

<x-oryn-block-crud::crud-form
    :action="$action"
    method="PUT"
    sidebarWidth="370px"
    submitLabel="Save"
    :discardUrl="$discardUrl"
    {{ $attributes }}
>
    {{-- Main sections: Order items, shipping, etc. --}}
    {{ $slot }}

    {{-- Sidebar: Customer info, summary, etc. --}}
    @if(isset($sidebar))
        <x-slot:sidebar>{{ $sidebar }}</x-slot:sidebar>
    @endif

    @if(isset($footerActions))
        <x-slot:footerActions>{{ $footerActions }}</x-slot:footerActions>
    @endif
</x-oryn-block-crud::crud-form>
