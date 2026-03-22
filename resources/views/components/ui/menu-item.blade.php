@props([
    'eventKey' => null,
    'href' => null,
    'active' => false,
    'disabled' => false,
    'icon' => null,
])

@php
    $baseClass = 'menu-item h-12';
    if (!$disabled) $baseClass .= ' menu-item-hoverable';
    if ($disabled) $baseClass .= ' menu-item-disabled';
@endphp

@if($href)
    <a
        href="{{ $href }}"
        @if($eventKey) @click="setActive('{{ $eventKey }}')" data-event-key="{{ $eventKey }}" @endif
        :class="{ 'menu-item-active': isActive('{{ $eventKey }}') }"
        {{ $attributes->merge(['class' => $baseClass]) }}
    >
        @if($icon) <span class="text-xl">{!! $icon !!}</span> @endif
        {{ $slot }}
    </a>
@else
    <div
        @if($eventKey) @click="setActive('{{ $eventKey }}')" data-event-key="{{ $eventKey }}" @endif
        :class="{ 'menu-item-active': isActive('{{ $eventKey }}') }"
        {{ $attributes->merge(['class' => $baseClass . ' cursor-pointer']) }}
    >
        @if($icon) <span class="text-xl">{!! $icon !!}</span> @endif
        {{ $slot }}
    </div>
@endif
