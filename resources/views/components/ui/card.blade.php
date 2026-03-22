@php
$baseClass = $cardClass();
if ($clickable) {
    $baseClass .= ' cursor-pointer hover:shadow-lg transition-shadow duration-150';
}
@endphp

<div {{ $attributes->merge(['class' => $baseClass]) }}>
    @isset ($header)
        <div class="card-header {{ $headerBordered ? 'card-header-border' : '' }} {{ isset($headerExtra) ? 'card-header-extra' : '' }}">
            <span>{{ $header }}</span>
            @isset ($headerExtra)
                <span>{{ $headerExtra }}</span>
            @endisset
        </div>
    @endisset

    <div class="card-body {{ $bodyClass }}">
        {{ $slot }}
    </div>

    @isset ($footer)
        <div class="card-footer {{ $footerBordered ? 'card-footer-border' : '' }}">
            {{ $footer }}
        </div>
    @endisset
</div>
