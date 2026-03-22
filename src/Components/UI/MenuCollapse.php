<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class MenuCollapse extends Component
{
    public function __construct(
        public ?string $eventKey = null,
        public ?string $label = null,
        public ?string $icon = null,
        public bool $defaultExpanded = false,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.menu-collapse');
    }
}
