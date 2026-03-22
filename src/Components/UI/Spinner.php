<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Spinner extends Component
{
    public function __construct(
        public int|string $size = 20,
        public bool $isSpinning = true,
        public bool $enableTheme = true,
        public ?string $customColorClass = null,
    ) {}

    public function spinnerColor(): string
    {
        return $this->customColorClass ?: ($this->enableTheme ? 'text-primary' : '');
    }

    public function render()
    {
        return view('oryn-ui::components.ui.spinner');
    }
}
