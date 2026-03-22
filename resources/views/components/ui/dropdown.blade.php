@props([
    'placement' => 'bottom-start',
    'trigger' => 'click',
    'menuClass' => null,
])

@php
    $placementClass = match($placement) {
        'top-start' => 'top-start',
        'top' => 'top-center',
        'top-end' => 'top-end',
        'bottom-start' => 'bottom-start',
        'bottom' => 'bottom-center',
        'bottom-end' => 'bottom-end',
        default => 'bottom-start',
    };
@endphp

<div
    x-data="{ open: false }"
    @if($trigger === 'click')
    @click.outside="open = false"
    @elseif($trigger === 'hover')
    @mouseenter="open = true"
    @mouseleave="open = false"
    @endif
    {{ $attributes->merge(['class' => 'dropdown']) }}
>
    {{-- Toggle --}}
    @isset($toggle)
        <div
            class="dropdown-toggle cursor-pointer"
            @if($trigger === 'click') @click="open = !open" @endif
        >
            {{ $toggle }}
        </div>
    @endisset

    {{-- Menu --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="dropdown-menu absolute {{ $placementClass }} {{ $menuClass }}"
        @click="open = false"
    >
        {{ $slot }}
    </div>
</div>
