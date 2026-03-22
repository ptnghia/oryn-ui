@props([
    'defaultValue' => null,
    'variant' => 'underline',
])

<div
    x-data="{ activeTab: '{{ $defaultValue }}', variant: '{{ $variant }}' }"
    {{ $attributes }}
>
    {{ $slot }}
</div>
