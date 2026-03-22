<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class Search extends Component
{
    public function __construct(
        public string $placeholder = 'Search...',
        public string $shortcut = '⌘K',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.search');
    }
}
