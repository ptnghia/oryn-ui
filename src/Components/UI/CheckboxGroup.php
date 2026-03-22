<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class CheckboxGroup extends Component
{
    public function __construct(
        public ?string $name = null,
        public bool $vertical = false,
        public string $checkboxClass = 'text-primary',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.checkbox-group');
    }
}
