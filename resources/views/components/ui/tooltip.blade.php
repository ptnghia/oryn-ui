@props([
    'title' => '',
    'placement' => 'top',
    'disabled' => false,
    'wrapperClass' => null,
])

@php
    $positionClasses = match($placement) {
        'top' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'left' => 'right-full top-1/2 -translate-y-1/2 ltr:mr-2 rtl:ml-2',
        'right' => 'left-full top-1/2 -translate-y-1/2 ltr:ml-2 rtl:mr-2',
        default => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
    };
@endphp

<span
    x-data="{ show: false }"
    @if(!$disabled)
    @mouseenter="show = true"
    @mouseleave="show = false"
    @focus="show = true"
    @blur="show = false"
    @endif
    {{ $attributes->merge(['class' => 'tooltip-wrapper relative inline-block ' . $wrapperClass]) }}
>
    {{ $slot }}
    <div
        x-show="show"
        x-cloak
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="tooltip bg-gray-800 dark:bg-black absolute z-50 {{ $positionClasses }} pointer-events-none whitespace-nowrap"
        role="tooltip"
    >
        <span>{{ $title }}</span>
    </div>
</span>
