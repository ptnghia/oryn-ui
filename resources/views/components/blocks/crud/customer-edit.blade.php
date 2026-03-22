{{-- Customer Edit Block --}}
{{-- Usage: <x-oryn-block-crud-customer-edit action="/customers/1"> ... form fields ... </x-oryn-block-crud-customer-edit> --}}
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
    {{-- Main sections: Overview, Address, etc. --}}
    {{ $slot }}

    {{-- Sidebar: Profile image, tags, account section, etc. --}}
    @if(isset($sidebar))
        <x-slot:sidebar>{{ $sidebar }}</x-slot:sidebar>
    @endif

    @if(isset($footerActions))
        <x-slot:footerActions>{{ $footerActions }}</x-slot:footerActions>
    @endif
</x-oryn-block-crud::crud-form>
