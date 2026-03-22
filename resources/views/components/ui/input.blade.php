@php
$inputClass = collect([
    'input',
    !$textArea ? $sizeClass() : 'input-textarea',
    $invalid ? 'input-invalid' : 'focus:ring-primary focus-within:ring-primary focus-within:border-primary',
    $disabled ? 'input-disabled' : '',
])->filter()->implode(' ');
$element = $textArea ? 'textarea' : 'input';
$hasAffix = $prefix || $suffix;
@endphp

@if ($hasAffix)
    <div class="input-wrapper">
        @if ($prefix)
            <div class="input-suffix-start">
                {!! $prefix !!}
            </div>
        @endif
        <{{ $element }}
            {{ $attributes->merge([
                'class' => $inputClass,
                'disabled' => $disabled ?: null,
                'style' => collect([
                    $prefix ? 'padding-left: 2.25rem;' : '',
                    $suffix ? 'padding-right: 2.25rem;' : '',
                ])->filter()->implode(' ') ?: null,
            ]) }}
        @if (!$textArea)
        />
        @else
        >{{ $slot }}</{{ $element }}>
        @endif
        @if ($suffix)
            <div class="input-suffix-end">
                {!! $suffix !!}
            </div>
        @endif
    </div>
@else
    <{{ $element }}
        {{ $attributes->merge([
            'class' => $inputClass,
            'disabled' => $disabled ?: null,
        ]) }}
    @if (!$textArea)
    />
    @else
    >{{ $slot }}</{{ $element }}>
    @endif
@endif
