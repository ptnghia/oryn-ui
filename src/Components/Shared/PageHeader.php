<?php

namespace Oryn\UI\Components\Shared;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $subtitle = null,
        public bool $contained = false,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.shared.page-header');
    }
}
