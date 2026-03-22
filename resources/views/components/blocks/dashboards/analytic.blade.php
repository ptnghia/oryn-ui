@props([])

{{-- Analytic Dashboard Layout --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-4']) }}>
    {{-- Header with period selector --}}
    @isset($header)
        {{ $header }}
    @endisset

    {{-- Main chart + metrics --}}
    <div class="flex flex-col 2xl:grid grid-cols-4 gap-4">
        <div class="col-span-4 2xl:col-span-3">
            @isset($analyticChart)
                {{ $analyticChart }}
            @endisset
        </div>
        <div class="2xl:col-span-1">
            @isset($metrics)
                {{ $metrics }}
            @endisset
        </div>
    </div>

    {{-- Bottom grid: pages + devices + channels + traffic --}}
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 xl:col-span-4">
            @isset($topPages)
                {{ $topPages }}
            @endisset
        </div>
        <div class="col-span-12 md:col-span-6 xl:col-span-4">
            @isset($deviceSession)
                {{ $deviceSession }}
            @endisset
        </div>
        <div class="col-span-12 xl:col-span-4">
            @isset($topChannel)
                {{ $topChannel }}
            @endisset
        </div>
        <div class="col-span-12">
            @isset($traffic)
                {{ $traffic }}
            @endisset
        </div>
    </div>

    {{ $slot }}
</div>
