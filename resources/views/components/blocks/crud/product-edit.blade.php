{{-- Product Edit Block --}}
{{-- Usage: <x-oryn-block-crud-product-edit action="/products/1"> ... form sections ... </x-oryn-block-crud-product-edit> --}}
@props([
    'action' => '',
    'discardUrl' => '',
])

<x-oryn-block-crud::crud-form
    :action="$action"
    method="PUT"
    sidebarWidth="440px"
    submitLabel="Save"
    :discardUrl="$discardUrl"
    {{ $attributes }}
>
    {{-- Main sections: General, Pricing, etc. --}}
    {{ $slot }}

    {{-- Sidebar: Images, Attributes, etc. --}}
    @if(isset($sidebar))
        <x-slot:sidebar>{{ $sidebar }}</x-slot:sidebar>
    @endif

    @if(isset($footerActions))
        <x-slot:footerActions>{{ $footerActions }}</x-slot:footerActions>
    @endif
</x-oryn-block-crud::crud-form>
