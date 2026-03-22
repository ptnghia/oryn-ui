<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Radio extends Component
{
    public function __construct(
        public ?string $name = null,
        public ?string $value = null,
        public ?string $label = null,
        public bool $disabled = false,
        public bool $readOnly = false,
        public bool $checked = false,
        public string $radioClass = 'text-primary',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.radio');
    }
}
