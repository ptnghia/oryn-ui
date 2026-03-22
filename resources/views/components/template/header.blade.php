{{-- Header: Top navigation bar with start/middle/end action areas --}}
<header {{ $attributes->merge(['class' => 'header']) }}>
    <div
        class="header-wrapper {{ $container ? 'container mx-auto' : '' }}"
        style="height: {{ \Oryn\UI\Components\Template\Header::HEADER_HEIGHT }}px"
    >
        <div class="header-action header-action-start">
            {{ $headerStart ?? '' }}
        </div>
        @if(isset($headerMiddle))
            <div class="header-action header-action-middle">
                {{ $headerMiddle }}
            </div>
        @endif
        <div class="header-action header-action-end">
            {{ $headerEnd ?? '' }}
        </div>
    </div>
</header>
