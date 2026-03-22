{{-- LanguageSelector: Language picker dropdown --}}
<div
    x-data="{ open: false, current: '{{ $current ?? '' }}' }"
    {{ $attributes->merge(['class' => 'relative']) }}
>
    {{-- Trigger --}}
    <button
        @click="open = !open"
        class="header-action-item header-action-item-hoverable flex items-center"
        aria-label="Select language"
    >
        @if(isset($trigger))
            {{ $trigger }}
        @else
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
            </svg>
        @endif
    </button>

    {{-- Dropdown --}}
    <div
        x-show="open"
        x-cloak
        x-transition
        @click.outside="open = false"
        class="absolute ltr:right-0 rtl:left-0 mt-2 w-40 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-black/5 dark:ring-white/10 py-1 z-50"
    >
        @foreach($languages as $lang)
            <button
                @click="current = '{{ $lang['code'] ?? '' }}'; open = false; $dispatch('language-change', { code: '{{ $lang['code'] ?? '' }}' })"
                class="flex items-center gap-2 w-full px-4 py-2 text-sm text-left hover:bg-gray-100 dark:hover:bg-gray-700"
                :class="{ 'text-primary font-semibold': current === '{{ $lang['code'] ?? '' }}' }"
            >
                @if(isset($lang['flag']))
                    <span class="text-lg">{{ $lang['flag'] }}</span>
                @endif
                {{ $lang['label'] ?? $lang['code'] ?? '' }}
            </button>
        @endforeach

        @if(empty($languages))
            {{ $slot }}
        @endif
    </div>
</div>
