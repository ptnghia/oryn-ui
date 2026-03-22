@props([
    'value' => '',
])

<div
    x-show="activeTab === '{{ $value }}'"
    x-cloak
    {{ $attributes->merge(['class' => 'py-4']) }}
>
    {{ $slot }}
</div>
