{{-- SideNavToggle: Toggle sidebar collapse state (visible >= lg) --}}
<button
    x-data
    @click="$store.layout.sideNavCollapse = !$store.layout.sideNavCollapse"
    {{ $attributes->merge(['class' => 'header-action-item header-action-item-hoverable hidden lg:block']) }}
    aria-label="Toggle sidebar"
>
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
    </svg>
</button>
