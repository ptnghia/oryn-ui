<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Toast extends Component
{
    public function __construct(
        public string $placement = 'top-end',
        public int $offsetX = 30,
        public int $offsetY = 30,
    ) {}

    public function placementStyle(): string
    {
        $styles = [];

        if (str_contains($this->placement, 'top')) {
            $styles[] = "top: {$this->offsetY}px";
        }
        if (str_contains($this->placement, 'bottom')) {
            $styles[] = "bottom: {$this->offsetY}px";
        }
        if (str_contains($this->placement, 'start')) {
            $styles[] = "left: {$this->offsetX}px";
        }
        if (str_contains($this->placement, 'end')) {
            $styles[] = "right: {$this->offsetX}px";
        }
        if ($this->placement === 'top-center' || $this->placement === 'bottom-center') {
            $styles[] = "left: 50%";
            $styles[] = "transform: translateX(-50%)";
        }

        return implode('; ', $styles);
    }

    public function render()
    {
        return view('oryn-ui::components.ui.toast');
    }
}
