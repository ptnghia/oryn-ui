{{-- Product Create Block --}}
{{-- Usage: <x-oryn-block-crud-product-create action="/products"> ... form sections ... </x-oryn-block-crud-product-create> --}}
@props([
    'action' => '',
    'discardUrl' => '',
])

<x-oryn-block-crud::crud-form
    :action="$action"
    method="POST"
    sidebarWidth="440px"
    submitLabel="Create"
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
