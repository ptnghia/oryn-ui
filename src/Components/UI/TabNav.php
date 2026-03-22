<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class TabNav extends Component
{
    public function __construct(
        public string $value = '',
        public bool $disabled = false,
        public ?string $icon = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.tab-nav');
    }
}
