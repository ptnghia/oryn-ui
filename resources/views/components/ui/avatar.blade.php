@php
$avatarClass = collect([
    'avatar',
    $sizeClass(),
    $shapeClass(),
])->filter()->implode(' ');

$innerSizeClass = match($size) {
    'lg' => 'avatar-inner-lg',
    'sm' => 'avatar-inner-sm',
    default => 'avatar-inner-md',
};
@endphp

<span {{ $attributes->merge(['class' => $avatarClass, 'style' => $sizeStyle()]) }}>
    @if ($src)
        <img class="avatar-img {{ $shapeClass() }}" src="{{ $src }}" alt="{{ $alt }}" loading="lazy" />
    @elseif ($icon)
        <span class="avatar-icon avatar-icon-{{ $size }}">
            {!! $icon !!}
        </span>
    @elseif ($slot->isNotEmpty())
        <span class="avatar-string {{ $innerSizeClass }}">
            {{ $slot }}
        </span>
    @endif
</span>
