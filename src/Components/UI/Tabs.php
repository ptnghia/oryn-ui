<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Tabs extends Component
{
    public function __construct(
        public ?string $defaultValue = null,
        public string $variant = 'underline',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.tabs');
    }
}
