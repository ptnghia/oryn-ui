{{-- Logo: Displays logo with light/dark and full/streamline variants --}}
@php
    $hasDarkVariants = $darkSrc || $streamlineDarkSrc;
@endphp
<div {{ $attributes->merge(['class' => 'logo']) }}>
    @if($type === 'streamline')
        @if($streamlineLightSrc)
            <img
                src="{{ $streamlineLightSrc }}"
                alt="{{ $alt }}"
                class="max-h-10 {{ $hasDarkVariants ? 'dark:hidden' : '' }}"
            />
        @endif
        @if($streamlineDarkSrc)
            <img src="{{ $streamlineDarkSrc }}" alt="{{ $alt }}" class="max-h-10 hidden dark:block" />
        @endif
    @else
        @if($lightSrc)
            <img
                src="{{ $lightSrc }}"
                alt="{{ $alt }}"
                class="max-h-10 {{ $hasDarkVariants ? 'dark:hidden' : '' }}"
            />
        @endif
        @if($darkSrc)
            <img src="{{ $darkSrc }}" alt="{{ $alt }}" class="max-h-10 hidden dark:block" />
        @endif
    @endif

    @if(!$lightSrc && !$darkSrc && !$streamlineLightSrc && !$streamlineDarkSrc)
        {{ $slot }}
    @endif
</div>
