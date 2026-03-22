@php
$btnClass = collect([
    'button button-press-feedback',
    $sizeClasses(),
    $shapeClass(),
    $variantClasses(),
    $block ? 'w-full' : 'inline-flex',
    'items-center justify-center gap-1',
    ($disabled || $loading) ? 'opacity-50 cursor-not-allowed' : '',
])->filter()->implode(' ');
@endphp

<{{ $tag }}
    {{ $attributes->merge([
        'class' => $btnClass,
        'disabled' => ($tag === 'button' && ($disabled || $loading)) ?: null,
        'href' => $tag === 'a' ? $href : null,
    ]) }}
>
    @if ($loading)
        <x-oryn-spinner :size="18" class="{{ $slot->isNotEmpty() ? ($iconAlignment === 'end' ? 'order-1' : '') : '' }}" />
    @endif

    @if ($icon && !$loading)
        <span class="{{ $iconAlignment === 'end' ? 'order-1' : '' }}">
            {!! $icon !!}
        </span>
    @endif

    @if ($slot->isNotEmpty())
        <span>{{ $slot }}</span>
    @endif
</{{ $tag }}>
