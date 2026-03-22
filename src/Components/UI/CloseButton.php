<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class CloseButton extends Component
{
    public function __construct(
        public bool $absolute = false,
        public bool $resetDefaultClass = false,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.close-button');
    }
}
