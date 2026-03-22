<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Dialog extends Component
{
    public function __construct(
        public bool $closable = true,
        public int|string $width = 520,
        public int|string|null $height = null,
        public ?string $contentClassName = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.dialog');
    }
}
