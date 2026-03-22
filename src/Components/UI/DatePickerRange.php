<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class DatePickerRange extends Component
{
    public function __construct(
        public ?string $nameStart = null,
        public ?string $nameEnd = null,
        public ?string $placeholder = 'Select date range',
        public string $size = 'md',
        public bool $disabled = false,
        public bool $invalid = false,
        public bool $clearable = true,
        public ?string $startDate = null,
        public ?string $endDate = null,
        public ?string $minDate = null,
        public ?string $maxDate = null,
        public int $firstDayOfWeek = 0,
        public string $separator = ' ~ ',
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
        return view('oryn-ui::components.ui.date-picker-range');
    }
}
