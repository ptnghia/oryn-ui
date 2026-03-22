<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class DatePicker extends Component
{
    public function __construct(
        public ?string $name = null,
        public ?string $placeholder = 'Select date',
        public string $size = 'md',
        public bool $disabled = false,
        public bool $invalid = false,
        public bool $clearable = true,
        public ?string $value = null,
        public ?string $minDate = null,
        public ?string $maxDate = null,
        public string $format = 'Y-m-d',
        public int $firstDayOfWeek = 0,
        public bool $closeOnSelect = true,
        public bool $inline = false,
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
        return view('oryn-ui::components.ui.date-picker');
    }
}
