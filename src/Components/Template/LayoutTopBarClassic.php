<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class LayoutTopBarClassic extends Component
{
    public function __construct(
        public bool $container = true,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.layout-top-bar-classic');
    }
}
