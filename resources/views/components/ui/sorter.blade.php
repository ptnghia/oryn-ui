@props([
    'column' => null,
])

<span
    {{ $attributes->merge(['class' => 'inline-flex items-center cursor-pointer select-none']) }}
    @if($column)
    @click="$dispatch('sort', { column: '{{ $column }}' })"
    @endif
>
    {{ $slot }}
    <span class="ml-1 inline-flex flex-col text-gray-400">
        <svg class="h-3 w-3 -mb-0.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>
        <svg class="h-3 w-3 -mt-0.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
    </span>
</span>
