{{-- NotificationDropdown: Header notification bell with dropdown list --}}
<div
    x-data="{
        open: false,
        notifications: [],
        unreadCount: {{ $unreadCount }},
        loading: false,
        toggle() {
            this.open = !this.open;
            if (this.open) {
                this.$dispatch('notification-opened');
            }
        },
        close() { this.open = false },
        markAsRead(id) {
            this.notifications = this.notifications.map(n => {
                if (n.id === id) n.readed = true;
                return n;
            });
            this.unreadCount = this.notifications.filter(n => !n.readed).length;
            this.$dispatch('notification-read', { id });
        },
        markAllAsRead() {
            this.notifications = this.notifications.map(n => ({ ...n, readed: true }));
            this.unreadCount = 0;
            this.$dispatch('notification-all-read');
        },
        setNotifications(items) {
            this.notifications = items;
            this.unreadCount = items.filter(n => !n.readed).length;
        }
    }"
    @click.outside="close()"
    {{ $attributes->merge(['class' => 'relative inline-block']) }}
>
    {{-- Toggle Button --}}
    <button
        type="button"
        @click="toggle()"
        class="relative text-2xl header-action-item header-action-item-hoverable"
    >
        @if(isset($trigger))
            {{ $trigger }}
        @else
            <span>{!! $bellIcon !!}</span>
            <span
                x-show="unreadCount > 0"
                x-cloak
                class="absolute top-1 right-1.5 w-2 h-2 rounded-full bg-primary"
            ></span>
        @endif
    </button>

    {{-- Dropdown Panel --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute right-0 mt-2 min-w-[280px] md:min-w-[340px] bg-white dark:bg-gray-800 rounded-xl shadow-lg ring-1 ring-black/5 dark:ring-white/10 z-50"
    >
        {{-- Header --}}
        <div class="px-4 pt-4 pb-2 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
            <h6 class="font-semibold heading-text">
                @if(isset($title))
                    {{ $title }}
                @else
                    Notifications
                @endif
            </h6>
            <button
                type="button"
                @click="markAllAsRead()"
                class="p-1 rounded-full text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                title="Mark all as read"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg>
            </button>
        </div>

        {{-- Notification List --}}
        <div class="overflow-y-auto" style="max-height: {{ $height }}">
            @if(isset($list))
                {{ $list }}
            @else
                {{-- Default: Alpine-driven list --}}
                <template x-if="loading">
                    <div class="flex items-center justify-center py-8" style="min-height: {{ $height }}">
                        <x-oryn-spinner size="lg" />
                    </div>
                </template>
                <template x-if="!loading && notifications.length === 0">
                    <div class="flex flex-col items-center justify-center py-8 text-center" style="min-height: {{ $height }}">
                        @if($emptyImage)
                            <img class="mx-auto mb-2 max-w-[150px]" src="{{ $emptyImage }}" alt="no-notification" />
                        @endif
                        <h6 class="font-semibold heading-text">{{ $emptyTitle }}</h6>
                        <p class="mt-1 text-sm text-gray-500">{{ $emptyMessage }}</p>
                    </div>
                </template>
                <template x-if="!loading && notifications.length > 0">
                    <div>
                        <template x-for="(item, index) in notifications" :key="item.id">
                            <div>
                                <div
                                    class="relative flex px-4 py-3 cursor-pointer rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700"
                                    @click="markAsRead(item.id)"
                                >
                                    <div x-html="item.avatar || ''" class="flex-shrink-0"></div>
                                    <div class="mx-3 flex-1 min-w-0">
                                        <div class="text-sm">
                                            <span x-show="item.target" class="font-semibold heading-text" x-text="item.target"></span>
                                            <span x-text="' ' + item.description"></span>
                                        </div>
                                        <span class="text-xs text-gray-500" x-text="item.date"></span>
                                    </div>
                                    <span
                                        class="absolute top-4 ltr:right-4 rtl:left-4 mt-1.5 w-2 h-2 rounded-full"
                                        :class="item.readed ? 'bg-gray-300 dark:bg-gray-600' : 'bg-primary'"
                                    ></span>
                                </div>
                                <div x-show="index < notifications.length - 1" class="border-b border-gray-200 dark:border-gray-700 mx-4"></div>
                            </div>
                        </template>
                    </div>
                </template>
            @endif
        </div>

        {{-- Footer --}}
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            @if(isset($footer))
                {{ $footer }}
            @else
                <a
                    href="{{ $viewAllUrl }}"
                    class="block w-full text-center px-4 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-primary-deep transition-colors"
                >
                    {{ $viewAllText }}
                </a>
            @endif
        </div>
    </div>
</div>
