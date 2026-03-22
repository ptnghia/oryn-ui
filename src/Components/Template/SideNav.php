<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class SideNav extends Component
{
    public const SIDE_NAV_WIDTH = 290;
    public const SIDE_NAV_COLLAPSED_WIDTH = 80;

    public function __construct(
        public string $mode = 'auto',
        public bool $background = true,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.side-nav');
    }
}
