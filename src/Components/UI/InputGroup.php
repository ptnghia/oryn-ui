<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public function __construct(
        public string $size = 'md',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.input-group');
    }
}
