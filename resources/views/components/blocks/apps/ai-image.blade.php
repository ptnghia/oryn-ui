{{-- AI Image Generator Block --}}
{{-- Usage: <x-oryn-block-app-ai-image> ... gallery ... </x-oryn-block-app-ai-image> --}}
@props([])

<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    {{-- Generator header + prompt --}}
    @if(isset($generator))
        <div class="mb-6">
            {{ $generator }}
        </div>
    @endif

    {{-- Gallery --}}
    <div class="mt-6">
        {{ $slot }}
    </div>

    {{-- Image dialog (optional) --}}
    @if(isset($imageDialog))
        {{ $imageDialog }}
    @endif
</div>
