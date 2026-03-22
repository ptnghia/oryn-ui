<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Skeleton extends Component
{
    public function __construct(
        public string $variant = 'block',
        public bool $animation = true,
        public string|int|null $width = null,
        public string|int|null $height = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.skeleton');
    }
}
