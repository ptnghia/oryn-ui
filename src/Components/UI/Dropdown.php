<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public function __construct(
        public string $placement = 'bottom-start',
        public string $trigger = 'click',
        public ?string $menuClass = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.dropdown');
    }
}
