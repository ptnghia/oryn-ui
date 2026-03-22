@props([
    'value' => null,
    'disabled' => false,
    'size' => 'md',
])

<button
    type="button"
    @click="select('{{ $value }}')"
    :class="isActive('{{ $value }}') ? 'segment-item-active' : ''"
    {{ $attributes->merge(['class' => 'segment-item ' . $sizeClass() . ($disabled ? ' segment-item-disabled' : '')]) }}
    @if($disabled) disabled @endif
>
    {{ $slot }}
</button>
