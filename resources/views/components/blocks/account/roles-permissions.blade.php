{{-- Roles & Permissions Block --}}
{{-- Usage: <x-oryn-block-account-roles-permissions> ... role groups + user table ... </x-oryn-block-account-roles-permissions> --}}
@props([
    'title' => 'Roles & Permissions',
])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-6">
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
        @if(isset($headerActions))
            <div class="flex items-center gap-2">
                {{ $headerActions }}
            </div>
        @endif
    </div>

    {{-- Role groups --}}
    @if(isset($groups))
        <div class="mb-6">
            {{ $groups }}
        </div>
    @endif

    {{-- Users table --}}
    {{ $slot }}

    {{-- Access dialog (optional) --}}
    @if(isset($accessDialog))
        {{ $accessDialog }}
    @endif
</div>
