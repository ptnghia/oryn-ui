<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class FormItem extends Component
{
    public function __construct(
        public ?string $label = null,
        public string $layout = 'vertical',
        public string $size = 'md',
        public bool $asterisk = false,
        public bool $invalid = false,
        public ?string $errorMessage = null,
        public ?string $htmlFor = null,
        public ?string $labelClass = null,
        public string|int|null $labelWidth = null,
        public ?string $extra = null,
    ) {}

    public function labelSizeClass(): string
    {
        if ($this->layout === 'vertical') {
            return 'mb-2';
        }

        return match ($this->size) {
            'lg' => 'h-14 ltr:pr-2 rtl:pl-2',
            'sm' => 'h-9 ltr:pr-2 rtl:pl-2',
            'xs' => 'h-7 ltr:pr-2 rtl:pl-2',
            default => 'h-11 ltr:pr-2 rtl:pl-2',
        };
    }

    public function labelStyle(): ?string
    {
        if ($this->layout === 'horizontal' && $this->labelWidth) {
            $w = is_numeric($this->labelWidth) ? $this->labelWidth . 'px' : $this->labelWidth;
            return "min-width: {$w};";
        }

        return null;
    }

    public function render()
    {
        return view('oryn-ui::components.ui.form-item');
    }
}
