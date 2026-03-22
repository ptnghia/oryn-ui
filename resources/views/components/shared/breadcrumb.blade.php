{{-- Breadcrumb: Navigation breadcrumb trail --}}
<nav {{ $attributes->merge(['class' => 'flex items-center text-sm']) }} aria-label="Breadcrumb">
    <ol class="flex items-center gap-1">
        @foreach($items as $index => $item)
            <li class="flex items-center">
                @if($index > 0)
                    <span class="mx-2 text-gray-400">{{ $separator }}</span>
                @endif
                @if(isset($item['href']) && $index < count($items) - 1)
                    <a
                        href="{{ $item['href'] }}"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors"
                    >
                        {{ $item['label'] ?? '' }}
                    </a>
                @else
                    <span class="text-gray-900 dark:text-gray-100 font-medium">
                        {{ $item['label'] ?? '' }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
