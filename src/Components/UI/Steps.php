<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Steps extends Component
{
    public function __construct(
        public int $current = 0,
        public string $status = 'in-progress',
        public bool $vertical = false,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.steps');
    }
}
