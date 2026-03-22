<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Drawer extends Component
{
    public function __construct(
        public string $placement = 'right',
        public int|string $width = 400,
        public int|string $height = 400,
        public bool $closable = true,
        public bool $showBackdrop = true,
        public bool $lockScroll = true,
        public ?string $title = null,
        public ?string $bodyClass = null,
        public ?string $headerClass = null,
        public ?string $footerClass = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.drawer');
    }
}
