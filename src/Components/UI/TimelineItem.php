<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class TimelineItem extends Component
{
    public function __construct(
        public bool $isLast = false,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.timeline-item');
    }
}
