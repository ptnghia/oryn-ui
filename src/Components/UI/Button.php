<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public string $variant = 'default',
        public string $size = 'md',
        public string $shape = 'round',
        public bool $block = false,
        public bool $active = false,
        public bool $loading = false,
        public bool $disabled = false,
        public ?string $icon = null,
        public string $iconAlignment = 'start',
        public ?string $tag = 'button',
        public ?string $href = null,
    ) {
        if ($this->href) {
            $this->tag = 'a';
        }
    }

    public function sizeClasses(): string
    {
        return match ($this->size) {
            'lg' => 'h-14 px-8 text-base',
            'sm' => 'h-9 px-3 text-sm',
            'xs' => 'h-7 px-3 text-xs',
            default => 'h-11 px-5 text-sm',
        };
    }

    public function shapeClass(): string
    {
        return match ($this->shape) {
            'circle' => 'rounded-full',
            'none' => 'rounded-none',
            default => 'rounded-xl',
        };
    }

    public function variantClasses(): string
    {
        $unclickable = $this->disabled || $this->loading;

        return match ($this->variant) {
            'solid' => collect([
                'bg-primary text-white',
                !$unclickable ? 'hover:bg-primary-mild' : '',
                $this->active ? 'bg-primary-deep' : '',
            ])->filter()->implode(' '),
            'plain' => collect([
                'text-primary',
                !$unclickable ? 'hover:bg-primary-subtle' : '',
                $this->active ? 'bg-primary-subtle' : '',
            ])->filter()->implode(' '),
            default => collect([
                'border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200',
                !$unclickable ? 'hover:border-primary hover:text-primary hover:ring-1 hover:ring-primary' : '',
                $this->active ? 'border-primary text-primary ring-1 ring-primary' : '',
            ])->filter()->implode(' '),
        };
    }

    public function render()
    {
        return view('oryn-ui::components.ui.button');
    }
}
