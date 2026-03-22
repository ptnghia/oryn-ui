<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $size = 'md',
        public bool $invalid = false,
        public bool $disabled = false,
        public bool $textArea = false,
        public ?string $prefix = null,
        public ?string $suffix = null,
    ) {}

    public function sizeClass(): string
    {
        return match ($this->size) {
            'lg' => 'input-lg h-14',
            'sm' => 'h-9',
            'xs' => 'h-7',
            default => 'h-11',
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.input');
    }
}
