<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Chart extends Component
{
    public function __construct(
        public string $type = 'line',
        public array $series = [],
        public string|int $width = '100%',
        public string|int $height = 300,
        public array $xAxis = [],
        public array $customOptions = [],
        public string $donutTitle = '',
        public string $donutText = '',
        public bool $loading = false,
    ) {}

    /** Default ApexCharts colors matching Ecme theme. */
    public function defaultColors(): array
    {
        return [
            '#2a85ff', '#7cbc7d', '#ff6a55', '#8C62FF', '#fbc13e',
            '#00C7BE', '#FE964A', '#febb7b', '#7cd2fa', '#bee9d3',
        ];
    }

    /** Build the default ApexCharts options based on type. */
    public function defaultOptions(): array
    {
        $base = [
            'chart' => [
                'zoom' => ['enabled' => false],
                'toolbar' => ['show' => false],
            ],
            'colors' => $this->defaultColors(),
            'dataLabels' => ['enabled' => false],
        ];

        return match ($this->type) {
            'line' => array_merge_recursive($base, [
                'stroke' => ['width' => 2.5, 'curve' => 'smooth', 'lineCap' => 'round'],
                'legend' => ['itemMargin' => ['vertical' => 10]],
                'xaxis' => ['categories' => $this->xAxis],
            ]),
            'area' => array_merge_recursive($base, [
                'stroke' => ['width' => 2.5, 'curve' => 'smooth', 'lineCap' => 'round'],
                'legend' => ['itemMargin' => ['vertical' => 10]],
                'xaxis' => ['categories' => $this->xAxis],
                'fill' => [
                    'type' => 'gradient',
                    'gradient' => ['shadeIntensity' => 1, 'opacityFrom' => 0.3, 'opacityTo' => 0.6, 'stops' => [0, 70, 100]],
                ],
            ]),
            'bar' => array_merge_recursive($base, [
                'plotOptions' => ['bar' => ['horizontal' => false, 'columnWidth' => '35px', 'borderRadius' => 4, 'borderRadiusApplication' => 'end']],
                'stroke' => ['show' => true, 'width' => 1, 'curve' => 'smooth', 'colors' => ['transparent']],
                'legend' => ['itemMargin' => ['vertical' => 10]],
                'xaxis' => ['categories' => $this->xAxis],
                'fill' => ['opacity' => 1],
            ]),
            'donut' => [
                'colors' => $this->defaultColors(),
                'plotOptions' => [
                    'pie' => [
                        'donut' => [
                            'labels' => [
                                'show' => true,
                                'total' => ['show' => true, 'showAlways' => true, 'label' => $this->donutTitle],
                            ],
                            'size' => '85%',
                        ],
                    ],
                ],
                'stroke' => ['colors' => ['transparent']],
                'labels' => $this->xAxis,
                'dataLabels' => ['enabled' => false],
                'legend' => ['show' => false],
            ],
            'radar' => [
                'chart' => ['type' => 'radar', 'zoom' => ['enabled' => false], 'toolbar' => ['show' => false]],
                'colors' => $this->defaultColors(),
            ],
            default => $base,
        };
    }

    /** Merge default options with custom options. */
    public function chartOptions(): array
    {
        return array_replace_recursive($this->defaultOptions(), $this->customOptions);
    }

    public function render()
    {
        return view('oryn-ui::components.ui.chart');
    }
}
