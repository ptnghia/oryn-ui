{{-- SideNav: Collapsible vertical sidebar --}}
@php
    $navWidth = \Oryn\UI\Components\Template\SideNav::SIDE_NAV_WIDTH;
    $navCollapsedWidth = \Oryn\UI\Components\Template\SideNav::SIDE_NAV_COLLAPSED_WIDTH;
    $headerHeight = \Oryn\UI\Components\Template\Header::HEADER_HEIGHT;
    $bgClass = $background ? 'side-nav-bg' : '';
    $modeClass = $mode === 'dark' ? 'contrast-dark' : '';
@endphp
<div
    x-data="{
        get collapsed() { return $store.layout.sideNavCollapse },
        get navWidth() { return this.collapsed ? {{ $navCollapsedWidth }} : {{ $navWidth }} },
    }"
    :style="{ width: navWidth + 'px', minWidth: navWidth + 'px' }"
    {{ $attributes->merge(['class' => "side-nav hidden lg:block {$bgClass} {$modeClass}"]) }}
    :class="{ 'side-nav-expand': !collapsed }"
>
    {{-- Logo area --}}
    @if(isset($logo))
        <div class="side-nav-header flex flex-col justify-center px-6" style="height: {{ $headerHeight }}px">
            {{ $logo }}
        </div>
    @endif

    {{-- Navigation content --}}
    <div class="side-nav-content overflow-y-auto" style="height: calc(100vh - {{ $headerHeight / 16 }}rem)">
        {{ $slot }}
    </div>
</div>
