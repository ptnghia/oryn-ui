{{-- ThemeConfigurator: Drawer panel for theme/layout/mode settings --}}
<div
    x-data="{
        open: false,
        mode: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
        direction: document.documentElement.dir || 'ltr',
        toggleMode() {
            this.mode = this.mode === 'dark' ? 'light' : 'dark';
            document.documentElement.classList.toggle('dark', this.mode === 'dark');
            localStorage.setItem('oryn-mode', this.mode);
        },
        toggleDirection() {
            this.direction = this.direction === 'ltr' ? 'rtl' : 'ltr';
            document.documentElement.dir = this.direction;
            localStorage.setItem('oryn-direction', this.direction);
        },
        applyPreset(preset) {
            $dispatch('theme-preset-change', { preset });
            localStorage.setItem('oryn-preset', preset);
        },
        applyLayout(layout) {
            $dispatch('layout-change', { layout });
            localStorage.setItem('oryn-layout', layout);
            // Blade layouts are server-rendered — reload to apply the new layout
            window.location.reload();
        },
    }"
    {{ $attributes }}
>
    {{-- Trigger button --}}
    <button
        @click="open = true"
        class="header-action-item header-action-item-hoverable"
        aria-label="Theme settings"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
    </button>

    {{-- Drawer panel --}}
    <template x-teleport="body">
        <div x-show="open" x-cloak class="fixed inset-0 z-50">
            {{-- Backdrop --}}
            <div
                x-show="open"
                x-transition:enter="transition-opacity duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="open = false"
                class="fixed inset-0 bg-black/50"
            ></div>

            {{-- Panel --}}
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="ltr:translate-x-full rtl:-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="ltr:translate-x-full rtl:-translate-x-full"
                class="fixed inset-y-0 ltr:right-0 rtl:left-0 w-80 bg-white dark:bg-gray-800 shadow-xl overflow-y-auto"
            >
                <div class="p-6">
                    {{-- Title --}}
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold">Theme</h3>
                        <button @click="open = false" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    {{-- Dark mode toggle --}}
                    <div class="mb-6">
                        <h4 class="text-sm font-medium mb-3">Mode</h4>
                        <div class="flex gap-2">
                            <button
                                @click="if(mode === 'dark') toggleMode()"
                                class="flex-1 py-2 px-3 rounded-lg border text-sm text-center"
                                :class="mode === 'light' ? 'border-primary bg-primary/10 text-primary' : 'border-gray-200 dark:border-gray-600'"
                            >Light</button>
                            <button
                                @click="if(mode === 'light') toggleMode()"
                                class="flex-1 py-2 px-3 rounded-lg border text-sm text-center"
                                :class="mode === 'dark' ? 'border-primary bg-primary/10 text-primary' : 'border-gray-200 dark:border-gray-600'"
                            >Dark</button>
                        </div>
                    </div>

                    {{-- Direction toggle --}}
                    <div class="mb-6">
                        <h4 class="text-sm font-medium mb-3">Direction</h4>
                        <div class="flex gap-2">
                            <button
                                @click="if(direction !== 'ltr') toggleDirection()"
                                class="flex-1 py-2 px-3 rounded-lg border text-sm text-center"
                                :class="direction === 'ltr' ? 'border-primary bg-primary/10 text-primary' : 'border-gray-200 dark:border-gray-600'"
                            >LTR</button>
                            <button
                                @click="if(direction !== 'rtl') toggleDirection()"
                                class="flex-1 py-2 px-3 rounded-lg border text-sm text-center"
                                :class="direction === 'rtl' ? 'border-primary bg-primary/10 text-primary' : 'border-gray-200 dark:border-gray-600'"
                            >RTL</button>
                        </div>
                    </div>

                    {{-- Theme presets --}}
                    <div class="mb-6">
                        <h4 class="text-sm font-medium mb-3">Color Preset</h4>
                        <div class="grid grid-cols-5 gap-2">
                            @foreach($presets as $preset)
                                <button
                                    @click="applyPreset('{{ $preset }}')"
                                    class="w-full aspect-square rounded-lg border-2 border-gray-200 dark:border-gray-600 hover:border-primary transition-colors"
                                    title="{{ ucfirst($preset) }}"
                                >
                                    <span class="block w-full h-full rounded-md bg-gradient-to-br
                                        @switch($preset)
                                            @case('default') from-blue-500 to-blue-700 @break
                                            @case('dark') from-gray-800 to-gray-950 @break
                                            @case('green') from-green-500 to-green-700 @break
                                            @case('purple') from-purple-500 to-purple-700 @break
                                            @case('orange') from-orange-500 to-orange-700 @break
                                            @default from-blue-500 to-blue-700
                                        @endswitch
                                    "></span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Layout presets --}}
                    <div class="mb-6">
                        <h4 class="text-sm font-medium mb-3">Layout</h4>
                        <div class="grid grid-cols-3 gap-2">
                            @foreach($layouts as $layout)
                                <button
                                    @click="applyLayout('{{ $layout }}')"
                                    class="py-2 px-2 rounded-lg border text-xs text-center border-gray-200 dark:border-gray-600 hover:border-primary transition-colors"
                                >
                                    {{ str_replace(['collapsible', 'Side', 'topBar', 'Classic', 'frameless', 'content', 'Overlay'], ['Collapse', ' Side', 'Top', ' Bar', 'Frameless', 'Content', ' Overlay'], $layout) }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Extra slot --}}
                    {{ $slot }}
                </div>
            </div>
        </div>
    </template>
</div>
