{{-- Calendar Block --}}
{{-- Usage: <x-oryn-block-app-calendar> ... calendar view ... </x-oryn-block-app-calendar> --}}
@props([])

<div {{ $attributes->merge(['class' => 'container mx-auto h-full']) }}>
    {{-- Calendar view (FullCalendar or custom) --}}
    {{ $slot }}

    {{-- Event dialog (optional) --}}
    @if(isset($eventDialog))
        {{ $eventDialog }}
    @endif
</div>
