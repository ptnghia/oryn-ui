@php
$skeletonClass = collect([
    'skeleton',
    $variant === 'circle' ? 'skeleton-circle' : 'skeleton-block',
    $animation ? 'animate-pulse' : '',
])->filter()->implode(' ');

$inlineStyle = collect([
    $width ? 'width: ' . (is_numeric($width) ? $width . 'px' : $width) . ';' : '',
    $height ? 'height: ' . (is_numeric($height) ? $height . 'px' : $height) . ';' : '',
])->filter()->implode(' ');
@endphp

<span {{ $attributes->merge(['class' => $skeletonClass, 'style' => $inlineStyle ?: null]) }}></span>
