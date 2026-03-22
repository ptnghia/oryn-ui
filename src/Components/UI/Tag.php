<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Tag extends Component
{
    public function __construct(
        public bool|string $prefix = false,
        public bool|string $suffix = false,
        public ?string $prefixClass = null,
        public ?string $suffixClass = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.tag');
    }
}
