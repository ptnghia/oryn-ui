<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Upload extends Component
{
    public function __construct(
        public ?string $accept = null,
        public bool $multiple = false,
        public bool $draggable = false,
        public bool $disabled = false,
        public bool $showList = true,
        public ?string $tip = null,
        public ?int $uploadLimit = null,
    ) {}

    public function render()
    {
        return view('oryn-ui::components.ui.upload');
    }
}
