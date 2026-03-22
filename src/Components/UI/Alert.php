<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $type = 'warning',
        public bool $closable = false,
        public bool $showIcon = false,
        public ?string $title = null,
        public ?string $customIcon = null,
    ) {}

    public function typeConfig(): array
    {
        return match ($this->type) {
            'success' => [
                'bg' => 'bg-success-subtle',
                'text' => 'text-success',
                'icon' => 'text-success',
            ],
            'info' => [
                'bg' => 'bg-info-subtle',
                'text' => 'text-info',
                'icon' => 'text-info',
            ],
            'danger' => [
                'bg' => 'bg-error-subtle',
                'text' => 'text-error',
                'icon' => 'text-error',
            ],
            default => [
                'bg' => 'bg-warning-subtle',
                'text' => 'text-warning',
                'icon' => 'text-warning',
            ],
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.alert');
    }
}
