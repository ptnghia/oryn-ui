<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Segment extends Component
{
    public function __construct(
        public ?string $value = null,
        public string $size = 'md',
        public string $selectionType = 'single',
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.segment');
    }
}
