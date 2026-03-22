@props([
    'name' => null,
    'vertical' => false,
    'disabled' => false,
    'radioClass' => 'text-primary',
])

<div {{ $attributes->merge(['class' => 'radio-group' . ($vertical ? ' vertical' : '')]) }}>
    {{ $slot }}
</div>
