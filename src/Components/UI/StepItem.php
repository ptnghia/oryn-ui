<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class StepItem extends Component
{
    public function __construct(
        public string $status = 'pending',
        public int $stepNumber = 1,
        public ?string $title = null,
        public ?string $description = null,
        public bool $isLast = false,
        public bool $vertical = false,
        public ?string $customIcon = null,
    ) {}

    public function iconClass(): string
    {
        return match ($this->status) {
            'complete' => 'step-item-icon bg-primary text-white',
            'error' => 'step-item-icon step-item-icon-error',
            'in-progress' => 'step-item-icon text-primary dark:text-gray-100 border-primary step-item-icon-current',
            default => 'step-item-icon step-item-icon-pending',
        };
    }

    public function connectClass(): string
    {
        $base = 'step-connect';
        $base .= $this->vertical ? ' step-connect-vertical' : '';
        $base .= $this->status === 'complete' ? ' bg-primary' : ' inactive';

        return $base;
    }

    public function render()
    {
        return view('oryn-ui::components.ui.step-item');
    }
}
