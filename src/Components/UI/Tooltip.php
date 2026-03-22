<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Tooltip extends Component
{
    public function __construct(
        public string $title = '',
        public string $placement = 'top',
        public bool $disabled = false,
        public ?string $wrapperClass = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.tooltip');
    }
}
