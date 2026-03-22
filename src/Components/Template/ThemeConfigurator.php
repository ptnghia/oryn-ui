<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class ThemeConfigurator extends Component
{
    public function __construct(
        public array $presets = ['default', 'dark', 'green', 'purple', 'orange'],
        public array $layouts = ['collapsibleSide', 'stackedSide', 'topBarClassic', 'framelessSide', 'contentOverlay'],
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.theme-configurator');
    }
}
