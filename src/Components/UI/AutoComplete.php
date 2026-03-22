<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class AutoComplete extends Component
{
    public function __construct(
        public ?string $name = null,
        public ?string $placeholder = 'Type to search...',
        public string $size = 'md',
        public bool $disabled = false,
        public bool $invalid = false,
        public bool $clearable = false,
        public array $options = [],
        public mixed $value = null,
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
        return view('oryn-ui::components.ui.auto-complete');
    }
}
