<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class SegmentItem extends Component
{
    public function __construct(
        public ?string $value = null,
        public bool $disabled = false,
        public string $size = 'md',
    ) {}

    public function sizeClass(): string
    {
        return match ($this->size) {
            'lg' => 'h-12 md:px-8 py-2 px-4 text-base',
            'sm' => 'h-8 px-3 py-2 text-sm',
            'xs' => 'h-7 px-3 py-1 text-xs',
            default => 'h-10 px-5 py-2',
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.segment-item');
    }
}
