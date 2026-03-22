{{-- LayoutBase: Global layout state manager --}}
<div
    x-data="{
        get sideNavCollapse() { return $store.layout.sideNavCollapse },
        set sideNavCollapse(v) { $store.layout.sideNavCollapse = v },
        get mobileNavOpen() { return $store.layout.mobileNavOpen },
        set mobileNavOpen(v) { $store.layout.mobileNavOpen = v },
        get layoutType() { return '{{ $type }}' },
        get adaptiveCardActive() { return {{ $adaptiveCardActive ? 'true' : 'false' }} },
    }"
    {{ $attributes->merge(['class' => 'app-layout-' . $type]) }}
>
    {{ $slot }}
</div>
