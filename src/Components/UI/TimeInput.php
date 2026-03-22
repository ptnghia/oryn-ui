<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class TimeInput extends Component
{
    public function __construct(
        public ?string $name = null,
        public string $size = 'md',
        public bool $disabled = false,
        public bool $invalid = false,
        public bool $showSeconds = true,
        public bool $use12Hours = false,
        public ?string $value = null,
    ) {}

    public function sizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'input-sm',
            'lg' => 'input-lg',
            default => 'input-md',
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.time-input');
    }
}
