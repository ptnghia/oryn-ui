<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Progress extends Component
{
    public function __construct(
        public int|float $percent = 0,
        public string $variant = 'line',
        public string $size = 'md',
        public bool $showInfo = true,
        public ?string $customColorClass = null,
        public ?string $customInfo = null,
        public int|string $width = 120,
        public int $strokeWidth = 6,
        public string $strokeLinecap = 'round',
        public string $gapPosition = 'top',
        public int $gapDegree = 0,
    ) {}

    public function barColor(): string
    {
        return $this->customColorClass ?: 'bg-primary';
    }

    public function strokeColor(): string
    {
        return $this->customColorClass ?: 'text-primary';
    }

    public function render()
    {
        return view('oryn-ui::components.ui.progress');
    }
}
