<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Avatar extends Component
{
    public function __construct(
        public string $size = 'md',
        public string $shape = 'circle',
        public ?string $src = null,
        public ?string $alt = null,
        public ?string $icon = null,
    ) {}

    public function sizeClass(): string
    {
        if (is_numeric($this->size)) {
            return '';
        }

        return 'avatar-' . $this->size;
    }

    public function sizeStyle(): ?string
    {
        if (is_numeric($this->size)) {
            $px = $this->size . 'px';
            return "width: {$px}; height: {$px}; min-width: {$px}; line-height: {$px};";
        }

        return null;
    }

    public function shapeClass(): string
    {
        return 'avatar-' . $this->shape;
    }

    public function render()
    {
        return view('oryn-ui::components.ui.avatar');
    }
}
