{{-- PageHeader: Page title with optional subtitle, breadcrumb, and extra actions --}}
<div {{ $attributes->merge(['class' => 'flex items-center justify-between mb-4' . ($contained ? ' container mx-auto' : '')]) }}>
    <div>
        @if(isset($breadcrumb))
            <div class="mb-2">
                {{ $breadcrumb }}
            </div>
        @endif
        @if($title)
            <h3 class="font-bold">{{ $title }}</h3>
        @endif
        @if($subtitle)
            <p class="text-gray-500 dark:text-gray-400 mt-1">{{ $subtitle }}</p>
        @endif
    </div>
    @if(isset($extra))
        <div class="flex items-center gap-2">
            {{ $extra }}
        </div>
    @endif
</div>
