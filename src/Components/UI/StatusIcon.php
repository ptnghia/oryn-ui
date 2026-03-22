<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class StatusIcon extends Component
{
    public function __construct(
        public string $type = 'info',
        public ?string $iconColor = null,
    ) {}

    public function iconColorClass(): string
    {
        if ($this->iconColor) {
            return $this->iconColor;
        }

        return match ($this->type) {
            'success' => 'text-success',
            'warning' => 'text-warning',
            'danger' => 'text-error',
            default => 'text-info',
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.status-icon');
    }
}
