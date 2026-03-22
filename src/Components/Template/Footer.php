<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class Footer extends Component
{
    public function __construct(
        public string $pageContainerType = 'contained',
        public ?string $copyright = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.footer');
    }
}
