<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class RadioGroup extends Component
{
    public function __construct(
        public ?string $name = null,
        public bool $vertical = false,
        public bool $disabled = false,
        public string $radioClass = 'text-primary',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.radio-group');
    }
}
