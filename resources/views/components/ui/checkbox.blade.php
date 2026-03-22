@props([
    'name' => null,
    'value' => null,
    'label' => null,
    'disabled' => false,
    'readOnly' => false,
    'checked' => false,
    'indeterminate' => false,
    'checkboxClass' => 'text-primary',
])

@php
    $labelClasses = 'checkbox-label' . ($disabled ? ' disabled' : '');
    $inputClasses = 'checkbox peer ' . $checkboxClass . ($disabled ? ' disabled' : '');
@endphp

<label {{ $attributes->merge(['class' => $labelClasses]) }}>
    <span class="checkbox-wrapper relative">
        <input
            type="checkbox"
            class="{{ $inputClasses }}"
            @if($name) name="{{ $name }}" @endif
            @if($value) value="{{ $value }}" @endif
            @if($disabled) disabled @endif
            @if($readOnly) readonly @endif
            @if($checked) checked @endif
        />
        @if($indeterminate)
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-3.5 w-3.5 stroke-neutral fill-neutral opacity-0 transition-opacity peer-checked:opacity-100 pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 mt-[1.25px]"
             viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5 10a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1z" clip-rule="evenodd" />
        </svg>
        @else
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-3.5 w-3.5 stroke-neutral fill-neutral opacity-0 transition-opacity peer-checked:opacity-100 pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 mt-[1.25px]"
             viewBox="0 0 20 20"
             fill="currentColor"
             stroke="currentColor"
             stroke-width="1">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        @endif
    </span>
    @if($label)
        <span @class(['opacity-50' => $disabled])>{{ $label }}</span>
    @elseif($slot->isNotEmpty())
        <span @class(['opacity-50' => $disabled])>{{ $slot }}</span>
    @endif
</label>
