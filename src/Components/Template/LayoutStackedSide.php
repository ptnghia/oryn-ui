<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class LayoutStackedSide extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('oryn-ui::components.template.layout-stacked-side');
    }
}
