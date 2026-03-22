@props([
    'name' => null,
    'value' => null,
    'label' => null,
    'disabled' => false,
    'readOnly' => false,
    'checked' => false,
    'radioClass' => 'text-primary',
])

@php
    $labelClasses = 'radio-label' . ($disabled ? ' disabled' : '');
    $inputClasses = 'radio peer ' . $radioClass . ($disabled ? ' disabled' : '');
@endphp

<label {{ $attributes->merge(['class' => $labelClasses]) }}>
    <span class="radio-wrapper relative">
        <input
            type="radio"
            class="{{ $inputClasses }}"
            @if($name) name="{{ $name }}" @endif
            @if($value) value="{{ $value }}" @endif
            @if($disabled) disabled @endif
            @if($readOnly) readonly @endif
            @if($checked) checked @endif
        />
        <svg viewBox="0 0 16 16"
             class="h-4 w-4 stroke-neutral fill-neutral opacity-0 peer-checked:opacity-100 pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 mt-[0.75px]"
             xmlns="http://www.w3.org/2000/svg">
            <circle cx="8" cy="8" r="3" />
        </svg>
    </span>
    @if($label)
        <span @class(['opacity-50' => $disabled])>{{ $label }}</span>
    @elseif($slot->isNotEmpty())
        <span @class(['opacity-50' => $disabled])>{{ $slot }}</span>
    @endif
</label>
