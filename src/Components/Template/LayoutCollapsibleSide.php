<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class LayoutCollapsibleSide extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('oryn-ui::components.template.layout-collapsible-side');
    }
}
