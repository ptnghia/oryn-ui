@props([])

{{-- Marketing Dashboard Layout --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-4']) }}>
    {{-- KPI summary cards --}}
    @isset($kpiSummary)
        {{ $kpiSummary }}
    @endisset

    {{-- Ads + Lead performance --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-y-4 xl:gap-x-4">
        <div class="col-span-2">
            @isset($adsPerformance)
                {{ $adsPerformance }}
            @endisset
        </div>
        <div>
            @isset($leadPerformance)
                {{ $leadPerformance }}
            @endisset
        </div>
    </div>

    {{-- Recent campaigns table --}}
    @isset($recentCampaign)
        {{ $recentCampaign }}
    @endisset

    {{ $slot }}
</div>
