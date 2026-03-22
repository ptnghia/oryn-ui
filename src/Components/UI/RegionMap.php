<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class RegionMap extends Component
{
    public function __construct(
        public array $mapData = [],
        public string $mapSource = '',
        public string $valueSuffix = '',
        public string $valuePrefix = '',
        public bool $hoverable = true,
        public string|int $height = 450,
        public int $scale = 170,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.region-map');
    }
}
