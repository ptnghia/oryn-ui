<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class MenuGroup extends Component
{
    public function __construct(
        public string $label = '',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.menu-group');
    }
}
