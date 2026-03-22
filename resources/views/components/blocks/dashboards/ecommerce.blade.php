@props([
    'title' => 'Overview',
])

{{-- Ecommerce Dashboard Layout --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-4 max-w-full overflow-x-hidden']) }}>
    {{-- Top section: main content + sidebar --}}
    <div class="flex flex-col xl:flex-row gap-4">
        {{-- Left column: overview + demographics --}}
        <div class="flex flex-col gap-4 flex-1 xl:col-span-3">
            {{-- Overview: stat cards + main chart --}}
            @isset($overview)
                {{ $overview }}
            @else
                <x-oryn-card>
                    <h4>{{ $title }}</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 rounded-2xl p-3 bg-gray-100 dark:bg-gray-700 mt-4">
                        @isset($statCards)
                            {{ $statCards }}
                        @endisset
                    </div>
                    @isset($chart)
                        <div class="mt-4">{{ $chart }}</div>
                    @endisset
                </x-oryn-card>
            @endisset

            {{-- Customer demographic --}}
            @isset($demographic)
                {{ $demographic }}
            @endisset
        </div>

        {{-- Right column: sales target + top product + revenue --}}
        <div class="flex flex-col gap-4 2xl:min-w-[360px]">
            @isset($salesTarget)
                {{ $salesTarget }}
            @endisset

            @isset($topProduct)
                {{ $topProduct }}
            @endisset

            @isset($revenueByChannel)
                {{ $revenueByChannel }}
            @endisset

            @isset($sidebar)
                {{ $sidebar }}
            @endisset
        </div>
    </div>

    {{-- Bottom section: recent orders table --}}
    @isset($recentOrders)
        {{ $recentOrders }}
    @endisset

    {{-- Default slot for additional content --}}
    {{ $slot }}
</div>
