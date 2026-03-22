<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public function __construct(
        public ?string $eventKey = null,
        public ?string $href = null,
        public bool $active = false,
        public bool $disabled = false,
        public ?string $icon = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.menu-item');
    }
}
