@props([
    'active' => false,
    'disabled' => false,
    'href' => null,
    'eventKey' => null,
    'variant' => 'default',
])

@if($variant === 'divider')
    <div class="menu-item-divider"></div>
@elseif($variant === 'header')
    <div {{ $attributes->merge(['class' => 'menu-title']) }}>
        {{ $slot }}
    </div>
@else
    @php
        $classes = 'menu-item menu-item-hoverable';
        if ($active) $classes .= ' menu-item-active';
        if ($disabled) $classes .= ' menu-item-disabled';
    @endphp

    @if($href)
        <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
            {{ $slot }}
        </a>
    @else
        <button type="button" {{ $attributes->merge(['class' => $classes . ' h-10']) }}>
            {{ $slot }}
        </button>
    @endif
@endif
