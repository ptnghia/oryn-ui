@props([
    'placement' => 'right',
    'width' => 400,
    'height' => 400,
    'closable' => true,
    'showBackdrop' => true,
    'lockScroll' => true,
    'title' => null,
    'bodyClass' => null,
    'headerClass' => null,
    'footerClass' => null,
])

@php
    $isVertical = in_array($placement, ['left', 'right']);
    $dimensionClass = $isVertical ? 'vertical' : 'horizontal';
    $contentStyle = $isVertical
        ? 'width: ' . (is_numeric($width) ? "{$width}px" : $width)
        : 'height: ' . (is_numeric($height) ? "{$height}px" : $height);

    $slideFrom = match($placement) {
        'left' => 'ltr:-translate-x-full rtl:translate-x-full',
        'right' => 'ltr:translate-x-full rtl:-translate-x-full',
        'top' => '-translate-y-full',
        'bottom' => 'translate-y-full',
    };

    $positionClass = match($placement) {
        'left' => 'left-0 top-0',
        'right' => 'right-0 top-0',
        'top' => 'top-0 left-0',
        'bottom' => 'bottom-0 left-0',
    };
@endphp

<div
    x-data="{ open: false }"
    x-on:open-drawer.window="if ($event.detail?.id === $el.id) open = true"
    x-on:close-drawer.window="if ($event.detail?.id === $el.id) open = false"
    x-on:keydown.escape.window="open = false"
    {{ $attributes }}
>
    {{-- Trigger slot --}}
    @isset($trigger)
        <div @click="open = true">
            {{ $trigger }}
        </div>
    @endisset

    {{-- Overlay + Drawer --}}
    <template x-teleport="body">
        {{-- Backdrop --}}
        @if($showBackdrop)
        <div
            x-show="open"
            x-cloak
            class="drawer-overlay"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false"
        ></div>
        @endif

        {{-- Drawer content --}}
        <div
            x-show="open"
            x-cloak
            class="fixed inset-0 z-40 overflow-hidden pointer-events-none"
        >
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="{{ $slideFrom }}"
                x-transition:enter-end="translate-x-0 translate-y-0"
                x-transition:leave="transition ease-in duration-300 transform"
                x-transition:leave-start="translate-x-0 translate-y-0"
                x-transition:leave-end="{{ $slideFrom }}"
                class="drawer-content {{ $dimensionClass }} {{ $positionClass }} pointer-events-auto"
                style="{{ $contentStyle }}"
                @click.stop
            >
                @if($title || $closable)
                    <div class="drawer-header {{ $headerClass }}">
                        @if($title)
                            <h4>{{ $title }}</h4>
                        @else
                            <span></span>
                        @endif
                        @if($closable)
                            <x-oryn-close-button @click="open = false" />
                        @endif
                    </div>
                @endif

                <div class="drawer-body {{ $bodyClass }}">
                    {{ $slot }}
                </div>

                @isset($footer)
                    <div class="drawer-footer {{ $footerClass }}">
                        {{ $footer }}
                    </div>
                @endisset
            </div>
        </div>
    </template>
</div>
