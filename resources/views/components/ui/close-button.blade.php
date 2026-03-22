@php
$buttonClass = collect([
    !$resetDefaultClass ? 'close-button button-press-feedback' : '',
    $absolute ? 'absolute z-10' : '',
])->filter()->implode(' ');
@endphp

<button {{ $attributes->merge(['class' => $buttonClass, 'type' => 'button']) }}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
    @endif
</button>
