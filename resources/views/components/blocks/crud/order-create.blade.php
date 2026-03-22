{{-- Order Create Block --}}
{{-- Usage: <x-oryn-block-crud-order-create action="/orders"> ... form sections ... </x-oryn-block-crud-order-create> --}}
@props([
    'action' => '',
    'discardUrl' => '',
])

<x-oryn-block-crud::crud-form
    :action="$action"
    method="POST"
    sidebarWidth="370px"
    submitLabel="Create"
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
