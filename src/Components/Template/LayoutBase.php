<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class LayoutBase extends Component
{
    public function __construct(
        public string $type = 'collapsibleSide',
        public bool $adaptiveCardActive = false,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.layout-base');
    }
}
