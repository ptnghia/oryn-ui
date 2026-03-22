@props([
    'type' => 'line',
    'series' => [],
    'width' => '100%',
    'height' => 300,
    'xAxis' => [],
    'customOptions' => [],
    'donutTitle' => '',
    'donutText' => '',
    'loading' => false,
])

@php
    $chartId = 'oryn-chart-' . uniqid();
    $optionsJson = json_encode($chartOptions(), JSON_THROW_ON_ERROR);
    $seriesJson = json_encode($series, JSON_THROW_ON_ERROR);
@endphp

<div
    {{ $attributes->merge(['class' => 'oryn-chart']) }}
    x-data="{
        chart: null,
        loading: {{ $loading ? 'true' : 'false' }},
        init() {
            if (typeof ApexCharts === 'undefined') {
                console.warn('Oryn UI: ApexCharts is not loaded. Include the ApexCharts CDN or install via npm.');
                return;
            }
            const options = {{ $optionsJson }};
            options.chart = options.chart || {};
            options.chart.type = '{{ $type }}';
            options.chart.height = {{ is_numeric($height) ? $height : "'{$height}'" }};
            options.chart.width = '{{ $width }}';
            options.series = {{ $seriesJson }};

            // Sync chart colors with CSS theme variables
            const style = getComputedStyle(document.documentElement);
            const cssVar = (name) => style.getPropertyValue(name).trim();
            const themeColors = [
                cssVar('--primary') || '#2a85ff',
                cssVar('--success') || '#7cbc7d',
                cssVar('--error') || '#ff6a55',
                '#8C62FF',
                cssVar('--warning') || '#fbc13e',
                cssVar('--info') || '#00C7BE',
                '#FE964A', '#febb7b', '#7cd2fa', '#bee9d3',
            ].map(c => c || '#2a85ff');

            if (options.colors && JSON.stringify(options.colors) === JSON.stringify({{ json_encode($defaultColors()) }})) {
                options.colors = themeColors;
            }

            this.chart = new ApexCharts(this.$refs.container, options);
            this.chart.render();
        },
        destroy() {
            if (this.chart) {
                this.chart.destroy();
                this.chart = null;
            }
        }
    }"
    x-on:destroy.window="destroy()"
    id="{{ $chartId }}"
>
    @if($loading)
        <div class="flex items-center justify-center" style="height: {{ is_numeric($height) ? $height . 'px' : $height }}">
            <x-oryn-spinner size="lg" />
        </div>
    @endif
    <div x-ref="container" @if($loading) x-show="!loading" @endif></div>
</div>
