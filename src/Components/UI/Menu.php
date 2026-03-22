<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Menu extends Component
{
    public function __construct(
        public string $variant = 'light',
        public bool $sideCollapsed = false,
        public ?string $defaultActiveKey = null,
        public ?string $defaultExpandedKey = null,
        public bool $routeMatching = false,
    ) {}

    public function variantClass(): string
    {
        return match ($this->variant) {
            'dark' => 'menu-dark',
            'themed' => 'menu-themed',
            'transparent' => 'menu-transparent',
            default => 'menu-light',
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.menu');
    }
}
