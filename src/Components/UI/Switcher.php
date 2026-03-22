<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Switcher extends Component
{
    public function __construct(
        public ?string $name = null,
        public bool $checked = false,
        public bool $disabled = false,
        public bool $readOnly = false,
        public bool $isLoading = false,
        public ?string $checkedContent = null,
        public ?string $uncheckedContent = null,
        public string $switcherClass = 'bg-primary dark:bg-primary',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.switcher');
    }
}
