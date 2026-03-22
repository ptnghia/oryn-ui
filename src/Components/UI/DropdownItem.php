<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    public function __construct(
        public bool $active = false,
        public bool $disabled = false,
        public ?string $href = null,
        public ?string $eventKey = null,
        public string $variant = 'default',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.dropdown-item');
    }
}
