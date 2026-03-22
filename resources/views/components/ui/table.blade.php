@props([
    'hoverable' => false,
    'compact' => false,
    'borderless' => false,
    'cellBorder' => false,
])

@php
    $tableClasses = $tableClasses();
@endphp

<div {{ $attributes->merge(['class' => 'overflow-x-auto']) }}>
    <table class="{{ $tableClasses }}">
        {{ $slot }}
    </table>
</div>
