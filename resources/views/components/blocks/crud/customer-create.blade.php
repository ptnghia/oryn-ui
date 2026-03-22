{{-- Customer Create Block --}}
{{-- Usage: <x-oryn-block-crud-customer-create action="/customers"> ... form fields ... </x-oryn-block-crud-customer-create> --}}
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
    {{-- Main sections: Overview, Address, etc. --}}
    {{ $slot }}

    {{-- Sidebar: Profile image, tags, etc. --}}
    @if(isset($sidebar))
        <x-slot:sidebar>{{ $sidebar }}</x-slot:sidebar>
    @endif

    @if(isset($footerActions))
        <x-slot:footerActions>{{ $footerActions }}</x-slot:footerActions>
    @endif
</x-oryn-block-crud::crud-form>
