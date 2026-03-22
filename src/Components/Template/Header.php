<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class Header extends Component
{
    public const HEADER_HEIGHT = 64;

    public function __construct(
        public bool $container = false,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.header');
    }
}
