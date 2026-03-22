{{-- Search: Dialog-based search overlay with keyboard shortcut --}}
<div
    x-data="{
        open: false,
        query: '',
        openSearch() { this.open = true; this.$nextTick(() => this.$refs.searchInput.focus()) },
        closeSearch() { this.open = false; this.query = '' },
    }"
    @keydown.window.meta.k.prevent="openSearch()"
    @keydown.window.ctrl.k.prevent="openSearch()"
    {{ $attributes }}
>
    {{-- Search trigger button --}}
    <button
        @click="openSearch()"
        class="header-action-item header-action-item-hoverable text-xl"
        aria-label="Search"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
    </button>

    {{-- Search dialog overlay --}}
    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            @keydown.escape.window="closeSearch()"
            class="fixed inset-0 z-50 flex items-start justify-center pt-[20vh]"
        >
            {{-- Backdrop --}}
            <div
                x-show="open"
                x-transition:enter="transition-opacity duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="closeSearch()"
                class="fixed inset-0 bg-black/50"
            ></div>

            {{-- Search panel --}}
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative w-full max-w-lg bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden"
            >
                {{-- Input --}}
                <div class="flex items-center px-4 border-b border-gray-200 dark:border-gray-700">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input
                        x-ref="searchInput"
                        x-model="query"
                        type="text"
                        placeholder="{{ $placeholder }}"
                        class="w-full py-3 px-3 bg-transparent border-0 outline-none focus:ring-0 text-gray-900 dark:text-gray-100 placeholder-gray-400"
                    />
                    <kbd class="hidden sm:inline-flex items-center px-2 py-0.5 text-xs font-mono text-gray-400 bg-gray-100 dark:bg-gray-700 rounded">
                        ESC
                    </kbd>
                </div>

                {{-- Results area --}}
                <div class="max-h-80 overflow-y-auto p-2">
                    {{ $slot }}
                    <template x-if="!query">
                        <div class="px-4 py-8 text-center text-gray-400 text-sm">
                            Type to search...
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </template>
</div>
