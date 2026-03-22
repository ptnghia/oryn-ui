<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Notification extends Component
{
    public function __construct(
        public ?string $type = null,
        public ?string $title = null,
        public bool $closable = false,
        public string|int $width = 350,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.notification');
    }
}
