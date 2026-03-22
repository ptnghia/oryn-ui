<?php

namespace Oryn\UI\Components\Template;

use Illuminate\View\Component;

class PageContainer extends Component
{
    public function __construct(
        public string $pageContainerType = 'default',
        public string $pageBackgroundType = 'default',
        public bool $footer = true,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.template.page-container');
    }
}
