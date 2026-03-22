{{-- UserDropdown: User profile dropdown in header --}}
<div
    x-data="{ open: false }"
    {{ $attributes->merge(['class' => 'relative']) }}
>
    {{-- Trigger --}}
    <button
        @click="open = !open"
        @keydown.escape="open = false"
        class="header-action-item flex items-center cursor-pointer"
        aria-haspopup="true"
        :aria-expanded="open"
    >
        @if(isset($trigger))
            {{ $trigger }}
        @elseif($avatar)
            <img
                src="{{ $avatar }}"
                alt="{{ $name ?? 'User' }}"
                class="w-8 h-8 rounded-full object-cover"
            />
        @else
            <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center text-sm font-semibold">
                {{ $name ? strtoupper(substr($name, 0, 1)) : '?' }}
            </div>
        @endif
    </button>

    {{-- Dropdown panel --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.outside="open = false"
        class="absolute ltr:right-0 rtl:left-0 mt-2 w-60 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-black/5 dark:ring-white/10 py-1 z-50"
    >
        {{-- User info header --}}
        @if($name || $email)
            <div class="py-2 px-3 flex items-center gap-3 border-b border-gray-200 dark:border-gray-700">
                @if($avatar)
                    <img src="{{ $avatar }}" alt="{{ $name }}" class="w-10 h-10 rounded-full object-cover" />
                @else
                    <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">
                        {{ $name ? strtoupper(substr($name, 0, 1)) : '?' }}
                    </div>
                @endif
                <div>
                    @if($name)
                        <div class="font-bold text-gray-900 dark:text-gray-100">{{ $name }}</div>
                    @endif
                    @if($email)
                        <div class="text-xs text-gray-500">{{ $email }}</div>
                    @endif
                </div>
            </div>
        @endif

        {{-- Menu items --}}
        @foreach($items as $item)
            <a
                href="{{ $item['href'] ?? '#' }}"
                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
            >
                @if(isset($item['icon']))
                    <span class="w-5 h-5 text-lg">{!! $item['icon'] !!}</span>
                @endif
                {{ $item['label'] ?? '' }}
            </a>
        @endforeach

        {{-- Extra slot content --}}
        {{ $slot }}
    </div>
</div>
