{{-- MobileNav: Drawer-based navigation for mobile (visible < lg) --}}
<div
    x-data="{ mobileOpen: false }"
    class="block lg:hidden"
    {{ $attributes }}
>
    {{-- Hamburger toggle --}}
    <button
        @click="mobileOpen = !mobileOpen"
        class="header-action-item header-action-item-hoverable text-2xl"
        aria-label="Toggle mobile navigation"
    >
        <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    {{-- Drawer overlay --}}
    <template x-teleport="body">
        <div
            x-show="mobileOpen"
            x-cloak
            class="fixed inset-0 z-40"
        >
            {{-- Backdrop --}}
            <div
                x-show="mobileOpen"
                x-transition:enter="transition-opacity ease-in-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-in-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="mobileOpen = false"
                class="fixed inset-0 bg-black/50"
            ></div>

            {{-- Drawer panel --}}
            <div
                x-show="mobileOpen"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="ltr:-translate-x-full rtl:translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="ltr:-translate-x-full rtl:translate-x-full"
                class="fixed inset-y-0 ltr:left-0 rtl:right-0 z-50 bg-white dark:bg-gray-800 overflow-y-auto"
                style="width: {{ $width }}px"
            >
                {{-- Drawer header --}}
                <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold">{{ $title }}</h3>
                    <button @click="mobileOpen = false" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                {{-- Navigation content --}}
                <div class="p-0">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </template>
</div>
