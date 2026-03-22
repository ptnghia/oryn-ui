@props([
    'name' => null,
    'vertical' => false,
    'checkboxClass' => 'text-primary',
])

<div {{ $attributes->merge(['class' => 'inline-flex gap-4' . ($vertical ? ' flex-col' : '')]) }}>
    {{ $slot }}
</div>
