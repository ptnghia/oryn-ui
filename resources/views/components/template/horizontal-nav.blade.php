{{-- HorizontalNav: Horizontal top menu navigation (used in TopBarClassic layout) --}}
<nav {{ $attributes->merge(['class' => 'flex items-center']) }}>
    {{ $slot }}
</nav>
