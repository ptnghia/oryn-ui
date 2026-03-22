@props([
    'mapData' => [],
    'mapSource' => '',
    'valueSuffix' => '',
    'valuePrefix' => '',
    'hoverable' => true,
    'height' => 450,
    'scale' => 170,
])

@php
    $mapId = 'oryn-map-' . uniqid();
    $dataJson = json_encode($mapData, JSON_THROW_ON_ERROR);
@endphp

<div
    {{ $attributes->merge(['class' => 'oryn-region-map relative']) }}
    x-data="{
        map: null,
        tooltipContent: '',
        tooltipX: 0,
        tooltipY: 0,
        mapData: {{ $dataJson }},
        init() {
            if (typeof L === 'undefined') {
                console.warn('Oryn UI: Leaflet is not loaded. Include the Leaflet CDN or install via npm.');
                return;
            }
            this.map = L.map(this.$refs.container, {
                zoomControl: true,
                scrollWheelZoom: false,
                attributionControl: false,
            }).setView([20, 0], 2);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
            }).addTo(this.map);

            @if($mapSource)
            fetch('{{ $mapSource }}')
                .then(r => r.json())
                .then(geoJson => this.addGeoJson(geoJson));
            @endif
        },
        addGeoJson(geoJson) {
            L.geoJSON(geoJson, {
                style: (feature) => {
                    const match = this.mapData.find(d => d.name === feature.properties.name);
                    return {
                        fillColor: match?.color || '#cbd5e1',
                        weight: 1,
                        opacity: 1,
                        color: '#94a3b8',
                        fillOpacity: 0.7,
                    };
                },
                onEachFeature: (feature, layer) => {
                    if (!{{ $hoverable ? 'true' : 'false' }}) return;
                    const match = this.mapData.find(d => d.name === feature.properties.name);
                    if (match) {
                        layer.bindTooltip(
                            feature.properties.name + ' - {{ $valuePrefix }}' + (match.value || '') + '{{ $valueSuffix }}',
                            { sticky: true }
                        );
                    }
                    layer.on({
                        mouseover: (e) => { e.target.setStyle({ fillOpacity: 0.9, weight: 2 }); },
                        mouseout: (e) => { this.map && L.geoJSON().resetStyle(e.target); e.target.setStyle({ fillOpacity: 0.7, weight: 1 }); },
                    });
                }
            }).addTo(this.map);
        },
        destroy() {
            if (this.map) {
                this.map.remove();
                this.map = null;
            }
        }
    }"
    id="{{ $mapId }}"
>
    <div x-ref="container" style="height: {{ is_numeric($height) ? $height . 'px' : $height }}; width: 100%;"></div>
</div>
