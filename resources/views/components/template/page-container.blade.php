{{-- PageContainer: Main content wrapper with optional header and footer --}}
@php
    $gutterClass = 'px-4 sm:px-6 md:px-8 py-4 sm:py-6 md:py-8';
@endphp
<div {{ $attributes->merge(['class' => 'h-full flex flex-auto flex-col justify-between']) }}>
    <main class="h-full">
        <div class="page-container relative h-full flex flex-auto flex-col {{ $pageContainerType !== 'gutterless' ? $gutterClass : '' }} {{ $pageContainerType === 'contained' ? 'container mx-auto' : '' }}">
            @if(isset($header))
                <div class="flex items-center justify-between mb-4 {{ $pageContainerType === 'contained' ? 'container mx-auto' : '' }}">
                    {{ $header }}
                </div>
            @endif

            @if($pageContainerType === 'contained')
                <div class="container mx-auto h-full">
                    {{ $slot }}
                </div>
            @else
                {{ $slot }}
            @endif
        </div>
    </main>

    @if($footer)
        {{ $footerSlot ?? '' }}
    @endif
</div>
