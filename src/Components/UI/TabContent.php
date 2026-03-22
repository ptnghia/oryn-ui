<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class TabContent extends Component
{
    public function __construct(
        public string $value = '',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.tab-content');
    }
}
