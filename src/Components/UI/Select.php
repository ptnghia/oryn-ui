<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Select extends Component
{
    public function __construct(
        public ?string $name = null,
        public ?string $placeholder = 'Select...',
        public string $size = 'md',
        public bool $multiple = false,
        public bool $searchable = false,
        public bool $clearable = false,
        public bool $disabled = false,
        public bool $loading = false,
        public bool $invalid = false,
        public array $options = [],
        public mixed $value = null,
    ) {}

    public function sizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'select-sm',
            'lg' => 'select-lg',
            default => 'select-md',
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.select');
    }
}
