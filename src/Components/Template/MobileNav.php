<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class MobileNav extends Component
{
    public function __construct(
        public int $width = 330,
        public string $title = 'Navigation',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.mobile-nav');
    }
}
