<?php

namespace Oryn\UI\Components\Shared;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public function __construct(
        public array $items = [],
        public string $separator = '/',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.shared.breadcrumb');
    }
}
