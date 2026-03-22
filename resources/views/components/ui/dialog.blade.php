@props([
    'closable' => true,
    'width' => 520,
    'height' => null,
    'contentClassName' => null,
])

@php
    $widthStyle = is_numeric($width) ? "max-width: {$width}px" : "max-width: {$width}";
    $heightStyle = $height ? (is_numeric($height) ? "height: {$height}px" : "height: {$height}") : '';
    $contentStyle = $widthStyle . ($heightStyle ? '; ' . $heightStyle : '');
@endphp

<div
    x-data="{ open: false }"
    x-on:open-dialog.window="if ($event.detail?.id === $el.id) open = true"
    x-on:close-dialog.window="if ($event.detail?.id === $el.id) open = false"
    x-on:keydown.escape.window="open = false"
    {{ $attributes }}
>
    {{-- Trigger slot --}}
    @isset($trigger)
        <div @click="open = true">
            {{ $trigger }}
        </div>
    @endisset

    {{-- Overlay + Dialog --}}
    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            class="dialog-overlay fixed inset-0 z-40 bg-black/60 dark:bg-black/80 backdrop-blur-md"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.self="open = false"
        >
            <div
                class="dialog mx-auto flex items-start justify-center min-h-full"
                @click.self="open = false"
            >
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="dialog-content {{ $contentClassName }}"
                    style="{{ $contentStyle }}"
                    role="dialog"
                    aria-modal="true"
                    @click.stop
                >
                    @if($closable)
                        <x-oryn-close-button :absolute="true" class="ltr:right-6 rtl:left-6 top-4.5" @click="open = false" />
                    @endif

                    @isset($header)
                        <div class="dialog-header mb-4">
                            {{ $header }}
                        </div>
                    @endisset

                    {{ $slot }}

                    @isset($footer)
                        <div class="dialog-footer mt-4">
                            {{ $footer }}
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </template>
</div>
